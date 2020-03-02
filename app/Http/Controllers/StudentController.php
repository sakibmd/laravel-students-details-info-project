<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', ['students'=> Student::paginate(5) ]);
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'roll' => 'required|unique:students',
            'section' => 'required|max:1'
        ]);

        $student = Student::create($validatedData);
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
        $student = Student::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'roll' => 'required',
            'section' => 'required|max:1'
        ]);
        $student->fill($validatedData);
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
