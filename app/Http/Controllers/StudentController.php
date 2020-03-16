<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', ['students'=> Student::orderBy('roll', 'ASC')->paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'name' => 'required|max:255',
            'roll' => 'required|unique:students',
            'section' => 'required|max:1',
            'image' => 'required|mimes:jpeg,png,jpg'

        ]);

         // Get Form Image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            
            // Make Unique Name for Image 
          $currentDate = Carbon::now()->toDateString();
          $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
 
 
         // Check Category Dir is exists
             if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
             }
 
 
             // Resize Image for category and upload
             $photo_sized = Image::make($image)->resize(1600,1100)->stream();
             Storage::disk('public')->put('profile/'.$imagename,$photo_sized);
 
  
          }else{
             $imagename = 'default.png';
          } 

          $student = new Student();
          $student->name = $request->name;
          $student->roll = $request->roll;
          $student->slug = $slug;
          $student->section = $request->section;
          $student->image = $imagename;
          $student->save();
        $request->session()->flash('status', 'Student Added successfully!');
        return redirect()->route('students.show', ['student' => $student->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('students.show', ['student' => Student::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', ['student'=> $student ]);

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $this->validate($request, [
            'name' => 'required|max:255',
            'section' => 'required|max:1',
            'image' => 'image'
        ]);

         // Get Form Image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        $student = Student::find($id);
        if (isset($image)) {
            
            // Make Unique Name for Image 
          $currentDate = Carbon::now()->toDateString();
          $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
 
 
         // Check Category Dir is exists
             if (!Storage::disk('public')->exists('profile')) {
                Storage::disk('public')->makeDirectory('profile');
             }
 
 
             // Resize Image for category and upload
             $photo_sized = Image::make($image)->resize(1600,1100)->stream();
             Storage::disk('public')->put('profile/'.$imagename,$photo_sized);
 
  
          }else{
                $imagename = $student->image;
          } 

          $student->name = $request->name;
          $student->slug = $slug;
          $student->section = $request->section;
          $student->image = $imagename;
          $student->save();

          $request->session()->flash('status', 'Student Updated Successfully!');
          return redirect()->route('students.show', ['student' => $student->id]);
  


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        $request->session()->flash('status', 'Student Deleted Successfully!');
        return redirect()->route('students.index');
    }
}
