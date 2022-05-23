<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassStoreRequest;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["classes"] = StudentClass::all();
        return view("class.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["teachers"] = Teacher::all();
        return view("class.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassStoreRequest $request)
    {
        //$class = $request->all();
        //$class["student_name"] = json_encode($class["student_name"]);
        //$class["name"] = $request->class_number . " - " . $request->class_letter;

        StudentClass::create([
            "name" => $request->class_number . " - " . $request->class_letter,
            "teacher_id" => $request->teacher_name,
            "student_id" => json_encode($request->student_name),
        ]);
        return redirect()->route("class.index")->with("message", "Class created");
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
    public function edit(StudentClass $class)
    {
        return view("class.update", compact("class"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassStoreRequest $request, StudentClass $class)
    {
        $class->update($request->validated());
        return redirect()->route("class.index")->with("message", "Class updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StudentClass::findOrFail($id)->delete();
        return redirect()->back()->with("message", "Class deleted");
    }


    // Fetch student
    public function fetchStudent(Request $request)
    {
        $data["students"] = Student::where("class_number", $request->class_number)->get();
        return response()->json($data);
    }
}
