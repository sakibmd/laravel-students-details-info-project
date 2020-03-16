@extends('layout')


@section('content')

<div class="container">
    <br><br><br>
    <h2 class="mt-3">Add New Student</h2>
<br>
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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

        

        <div class="form-group">
            <label for="section">Select An Image</label>
            <input type="file" name="image"  value="{{ old('image') }}" >
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


        
        <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        <button type="submit" class="btn btn-info">Create</button>
    </form>


    
</div>
<br><br><br>
@endsection