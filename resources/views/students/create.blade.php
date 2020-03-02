@extends('layout')


@section('content')


<h2>Add New Student</h2>
<br>
    
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" placeholder="Enter Roll" value="{{ old('roll') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" name="section" placeholder="Enter Section" value="{{ old('section') }}" class="form-control">
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


        <button type="submit" class="btn btn-info">Create</button>
    </form>

@endsection