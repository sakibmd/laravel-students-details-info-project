@extends('layout')


@section('content')

<h2>Student Details</h2>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card bg-dark" style="width: 18rem;color:white">
                    <img class="card-img-top p-2" src="{{ asset('storage/profile/'.$student->image) }}" alt="Card image cap" class="img-responsive thumbnail">
                    <div class="card-body">
                      <h5 class="card-title text-center"><b>{{ $student->name }}</b></h5>
                      <p style="text-align:justify;line-height: 1.0;" class="text-center"><small>Student of Metropolitan University, Department of CSE</small><br>
                      </p>
                      {{-- <p class="text-center"><strong>Roll:</strong> {{ $student->roll }} </p> --}}
                      <strong>Roll:</strong> {{ $student->roll }} <br>
                      <strong>Section:</strong> {{ $student->section }} <br>
                      <strong>Batch:</strong> {{ $student->batch }} <br>
                      
                      <small><b>Member Since</b></small> {{ $student->created_at->diffForHumans() }}
                        @if ((new Carbon\Carbon())->diffInMinutes($student->created_at) < 60)
                        <strong>New!</strong>
                        @endif
                      <div class="row">
                          <div class="col-sm-6"><a class="btn btn-info btn-block m-2" href="{{ route('students.edit', $student->id) }}">Edit</a></div>
                          <div class="col-sm-6"><a class="btn btn-primary btn-block m-2" href="{{ route('students.index') }}">Back</a></div>

                    </div>
                </div> 
                  </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection