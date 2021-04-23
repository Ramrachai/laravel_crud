<x-app-layout>
    <h2 class = 'display-5'>Edit Student information </h2>

    {{-- form start --}}
    <div class="container mt-10">
        <div class="row  mx-auto">
            <div class="col-10 col-md-6">

                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

            <form action="{{ route('student.update') }}" method="POST">
                
                @csrf
                @method('PUT') 

                <input type="hidden" name='id' value="{{ $student->id }}">
                <div class="row mb-3">
                    <label for="name" class="uppercase col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="name" 
                            name='name'
                            value="{{ $student->name }}">
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="row mb-3">
                    <label for="email" class="uppercase col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name='email' value="{{ $student->email }}">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="roll" class="uppercase col-sm-2 col-form-label">roll</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="roll" name='roll' value="{{ $student->roll }}">
                    </div>
                    @error('roll')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="address" class="uppercase col-sm-2 col-form-label">address</label>
                    <div class="col-sm-10">
                        <textarea class='form-control' name="address" id="address">{{ $student->address }}</textarea>
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class=" btn btn-primary center-block mx-auto">Update</button>
            </form>
            </div> <!-- col finish -->
        </div> <!-- row finish -->
    </div> <!-- container finish -->
    {{-- form finish --}}

</x-app-layout>
