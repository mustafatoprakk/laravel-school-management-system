<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["title"] = "Teacher";
        $data["teachers"] = Teacher::all();
        $data["courses"]=Course::all();
        return view("teachers.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["courses"] = Course::all();
        $data["title"] = "Teacher Create";
        return view("teachers.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherStoreRequest $request)
    {
        Teacher::create([
            "name" => $request->name,
            "surname" => $request->surname,
            "email" => $request->email,
            "birth_date" => $request->birth_date,
            "branch" => $request->branch,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        return redirect()->route("teacher.index")->with("message", "Teacher created");
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
    public function edit(Teacher $teacher)
    {
        $courses = Course::all();
        return view("teachers.update", compact("teacher", "courses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherStoreRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return redirect()->route("teacher.index")->with("message", "Teacher updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return redirect()->back()->with("message", "Teacher deleted");
    }
}
