<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return "index method call";
        $student_data = Student::all();
        return view("student.index", ['student_data' => $student_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("Store Method Call");
        // dd($request->input());

        $student_data = new Student();
        $student_data->name = $request->name;
        $student_data->email = $request->email;
        $student_data->course = $request->course;
        $student_data->save();
        return redirect()->route('student.index');
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
        echo '<pre>';
        print_r("show call");
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_data = Student::find($id);
        return view('student.edit', ["student_data" => $student_data]);
        //
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
        //
        // echo '<pre>'; print_r("update method cll"); exit;
        $student_data =  Student::find($id);
        $student_data->name = $request->name;
        $student_data->email =   $request->email;
        $student_data->course =  $request->course;
        $student_data->save();
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_is_delete = Student::find($id)->delete();
        if ($student_is_delete) {
            # code...
            return redirect()->route('student.index');
        }
        //
    }
}
