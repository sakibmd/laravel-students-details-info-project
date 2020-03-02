@extends('layout')


@section('content')

<h2>Student List</h2>
<br><br>
 <table class="table table-dark" width="400px">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Batch</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->batch }}</td>
                <td>
                    <a href="{{ route('students.show', ['student' => $student->id]) }}" class="btn btn-success btn-block">Show</a>
                </td>
                <td>
                    <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-info btn-block">Edit</a>
                </td>
                <td>
                    <form action="{{ route('students.destroy', ['student' => $student->id]) }}" 
                        onsubmit="return confirm('Are you sure?')" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-block" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            No Data Found
        @endforelse
    </tbody>
  </table>
  
  {{ $students->links() }}

  {{-- @forelse ($students as $student)
      {{ $student->id }}
  @empty
      No Data Found

  @endforelse --}}

@endsection