<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center gap-3">
            <h2 class="text-3xl text-purple-700 text-center">Add new student</h2>
            <a href="{{ route('student.list') }}"
                class=" no-underline hover:bg-indigo-700 text-indigo-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Students list
            </a>
        </div>
    </x-slot>

    {{-- form start --}}
    <div class="container mt-10">
        <div class="row  justify-center">
            <div class="col-10 col-md-6">
            <form action="{{ route('student.add') }}" method="POST">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @csrf
                <div class="row mb-3">
                    <label for="name" class="uppercase col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name='name'>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="row mb-3">
                    <label for="email" class="uppercase col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name='email'>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="roll" class="uppercase col-sm-2 col-form-label">roll</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="roll" name='roll'>
                    </div>
                    @error('roll')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="address" class="uppercase col-sm-2 col-form-label">address</label>
                    <div class="col-sm-10">
                        <textarea class='form-control' name="address" id="address"></textarea>
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <button type="submit"
                    class=" btn btn-primary center-block mx-auto">Save</button>
            </form>
            </div> <!-- col finish -->
        </div> <!-- row finish -->
    </div> <!-- container finish -->
    {{-- form finish --}}

</x-app-layout>
