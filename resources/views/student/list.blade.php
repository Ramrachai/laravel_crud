<x-app-layout>
        
            <h2 class="title mt-0 text-center">Students List</h2>
            <a href="{{ route('student.add') }}"
                class="btn btn-lg btn-primary ">
                Add new student
            </a>
       
            

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>{{ session('message') }}</strong> 
                </div>
                
                <script>
                  $(".alert").alert();
                </script>
                @endif

                <table class="table">
                    <thead>
                        <tr class='bg-purple-800 text-gray-200'>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roll</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->roll }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <a 
                                        href='{{ route('student.profile', $student->id) }}' 
                                        class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <a 
                                        href='{{ route('student.edit', $student->id) }}' 
                                        class="btn btn-sm btn-warning">
                                        Edit
                                    </a>


                                    <form 
                                        action="{{ route('student.delete') }}" method="POST"
                                        class="d-inline-block">
                                        @method('delete')   
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $student->id }}">                         
                                    <button class='btn btn-sm btn-danger ' type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{ $students->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
