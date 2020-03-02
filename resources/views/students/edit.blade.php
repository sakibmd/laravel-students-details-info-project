@extends('layout')


@section('content')


<h2>Add New Student</h2>
<br>
    
    <form action="{{ route('students.update', ['student' => $student->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Name" value="{{ old('name', $student->name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" placeholder="Enter Roll" value="{{ old('roll', $student->roll) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" name="section" placeholder="Enter Section" value="{{ old('section', $student->section) }}" class="form-control">
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


        <button type="submit" class="btn btn-info">Update</button>
    </form>

@endsection