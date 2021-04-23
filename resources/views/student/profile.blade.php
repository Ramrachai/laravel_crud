
<x-app-layout>
    <div class="row my-4  d-flex justify-content-start ">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    Profile of {{ $students->name }}
                </div>
                <div class="card-body">
                    <h4 class="card-title"> Name: {{ $students->name }}</h4>
                    <h4 class="card-title"> Email: {{ $students->email }}</h4>
                    <h4 class="card-title"> Roll : {{ $students->roll }}</h4>
                    <h4 class="card-title"> Address: {{ $students->address }}</h4>
                </div>
                
            </div>
        </div>
    </div>


</x-app-layout>