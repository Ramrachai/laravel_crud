<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    //
    public function showpage(){
        return view('student.add');
    }

    public function add(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'min:4', 'max:20'],
            'email' => ['required'],
            // 'email' => ['required', 'email:rfc,dns'],
            'roll' => ['required','unique:students', 'numeric', 'min:4','max:300'],
            'address' => ['required', 'min:4','max:300'],
        ]);

        Student::insert([
            'name' => $request->name, 
            'email' => $request->email, 
            'roll' => $request->roll, 
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]); 
        return Redirect()->back()->with('success', 'Student added successfully');
    }


    public function list(){
        $students = Student::latest()->paginate(5); 
        return view('student.list' , compact('students', $students));
    }

    public function profile(Request $request){
        $id = $request->id; 
        $students = Student::find($id) ; 
        return view('student.profile', compact('students')); 
    }

    public function edit(Request $request, $id) {

        // dd($id); 
        
        $student = Student::where('id',$id)->first(); 
        return view('student.edit', compact('student')); 
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'roll' => 'required',
            'address' => 'required'
        ]); 
        Student::where('id', $request->id)->update([
            'name' => $request->name, 
            'email' => $request->email, 
            'roll' => $request->roll, 
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]); 
        return Redirect()->back()->with('message', 'Student Updated Sucessfully');
    }

    public function delete( Request $request){
        
        $student = Student::where('id',$request->id); 
        $student->delete(); 
        return Redirect('/student/list')->with('message', 'Student Deleted successfully');
    }
}
