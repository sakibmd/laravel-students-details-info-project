@extends('layout')


@section('content')


<div class="container">
    <br><br><br>
    <h2>Edit Student</h2>
    <br>
    
    <form action="{{ route('students.update', ['student' => $student->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Name" value="{{ old('name', $student->name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" placeholder="Enter Roll" value="{{ old('roll', $student->roll) }}" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" name="section" placeholder="Enter Section" value="{{ old('section', $student->section) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="section">Image</label>
            <input type="file" name="image"  value="{{ old('image', $student->image) }}" class="form-control">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <a class="btn btn-danger mr-2" href="{{ route('students.index') }}">Back</a>
            <button type="submit" class="btn btn-info">Update</button>
        </div>
        
    </form>

</div>

@endsection