<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::select('students.*','classes.name as class_name')->latest('id')
                    ->leftJoin('classes','classes.id','=','students.student_class')
                    ->paginate(5);
        return view('index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $class_list = Classes::latest()->get();
        return view('create',['classes'=>$class_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:60',
            'middle_name' => 'nullable|string|max:60',
            'last_name' => 'required|string|max:60',
            'student_gender' => 'required',
            'email' => 'required|email',
            'student_class' => 'required|integer',
            'student_age' => 'required|integer|max:50|min:18',
        ]);

        $student = new Student;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->student_gender = $request->student_gender;
        $student->email = $request->email;
        $student->student_class = $request->student_class;
        $student->student_age = $request->student_age;
        $student->save();

        return '1';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class_list = Classes::latest()->get();
        $student = Student::find($id);

        return view('edit',['student'=>$student,'classes'=>$class_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:60',
            'middle_name' => 'nullable|string|max:60',
            'last_name' => 'required|string|max:60',
            'student_gender' => 'required',
            'email' => 'required|email',
            'student_class' => 'required|integer',
            'student_age' => 'required|integer|max:50|min:18',
        ]);

        $student = Student::find($id);
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->last_name = $request->last_name;
        $student->student_gender = $request->student_gender;
        $student->email = $request->email;
        $student->student_class = $request->student_class;
        $student->student_age = $request->student_age;
        $student->save();
        
        return '1';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Student::where('id',$id)->delete();
        return $destroy;
    }
}
