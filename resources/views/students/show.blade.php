@extends('layout')


@section('content')


<h2>Student Details</h2>
<br>
    <p>
        <strong>Name:</strong> {{ $student->name }} <br>
        <strong>Roll:</strong> {{ $student->roll }} <br>
        <strong>Section:</strong> {{ $student->section }} <br>
        <strong>Batch:</strong> {{ $student->batch }} <br>

        <p>
            {{-- Added: {{ $posts->created_at }} --}}
            Added: {{ $student->created_at->diffForHumans() }}
            @if ((new Carbon\Carbon())->diffInMinutes($student->created_at) < 60)
            <strong>New!</strong>
            @endif
        </p>
    </p>

    <a class="btn btn-primary" href="{{ route('students.index') }}">Back</a>

@endsection