<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function loadclass(Request $request){
        $classStudents = ClassStudent::get();
        $output = '';
        foreach($classStudents as $class){
            $output .= '<tr>
            <th scope="row">'. $class->id .'</th>
            <td colspan="1">'. $class->class_name .'</td>
            <td colspan="1">'. $class->class_major .'</td>
            <td colspan="1">'. $class->class_desc .'</td>
            <td style="text-align: center"> <button type="button"
                    class="btn btn-danger btnDeleteClass" data-id="'.$class->id.'">Delete</button> </td>
            <td style="text-align: center"><button type="button"
                    class="btn btn-primary btnModifyClass" data-id="'.$class->id.'">Modify</button> </td>
        </tr>';
        }
        return $output;
    }

    public function addClass(Request $request){
        $className = $request->className;
        $classMajor = $request->classMajor;
        $classDesc = $request->classDesc;
        $classStudent = new ClassStudent();

        $classStudent->class_name = $className;
        $classStudent->class_major = $classMajor;
        $classStudent->class_desc = $classDesc;
        $classStudent->save();
        return "success";
    }
    /**
     * Display the specified resource.
     */
    public function show(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassStudent $classStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassStudent $classStudent)
    {
        //
    }
}
