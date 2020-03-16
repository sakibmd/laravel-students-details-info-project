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
                    <a href="{{ route('students.show', ['student' => $student->id]) }}" class="btn btn-success btn-block">Details</a>
                </td>
                <td>
                    <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-info btn-block">Edit</a>
                </td>
                <td>
					<button class="btn btn-danger btn-block" type="button" onclick="deleteStudent({{ $student->id }})">Delete</button>
                          
                    <form id="delete-form-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" 
					method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                                            
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


 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">
       function deleteStudent(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
            
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
                }
            })
       }	
   
       </script>