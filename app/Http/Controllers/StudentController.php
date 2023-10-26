<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\ClassStudent;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classStudent = ClassStudent::get();
        $student = Student::get();
        // dd($classStudent);
        return view('index', ['classStudents' => $classStudent, 'students' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function loadstudent(Request $request){
        $students = Student::get();
        $output = '';

        foreach($students as $student){
            $output .= '<tr>
            <th scope="row">'. $student->id .'</th>
            <td colspan="1">'.$student->student_name.'</td>
            <td colspan="1">'. $student->classStudent->class_name .'</td>
            <td colspan="1">'. $student->student_email .'</td>
            <td colspan="1">'. $student->student_phone .'</td>
            <td style="text-align: center"> <button type="button"
                    class="btn btn-danger btnDeleteStudent" data-id="'.$student->id.'">Delete</button> </td>
            <td style="text-align: center"><button type="button"
                    class="btn btn-primary btnModifyStudent" data-id="'.$student->id.'">Modify</button> </td>
        </tr>';
        }
        return $output;
    }

    public function addstudent(Request $request){
        $studentName = $request->studentName;
        $studentEmail = $request->studentEmail;
        $studentPhone = $request->studentPhone;
        $studentClass = $request->classId;
        $student = new Student();
        $student->student_name = $studentName;
        $student->student_email = $studentEmail;
        $student->student_phone = $studentPhone;
        $student->class_id = $studentClass;
        $student->save();

        return "success";
    }

    public function deletedstudent(Request $request){
        $id = $request->id;
        $student = Student::where("id", $id)->first();
        $student->delete();
        return "success";
    }

    public function searchstudent(Request $request){
        $key_search = '%' . $request->key_sreach . '%';
        $selectedValue = $request->selectedValue;
        $students = null;
        if($selectedValue == 0){
            $students = Student::where("student_name", "like", $key_search)->get();
            $output = '';
        foreach($students as $student){
            $output .= '<tr>
            <th scope="row">'. $student->id .'</th>
            <td colspan="1">'.$student->student_name.'</td>
            <td colspan="1">'. $student->classStudent->class_name .'</td>
            <td colspan="1">'. $student->student_email .'</td>
            <td colspan="1">'. $student->student_phone .'</td>
            <td style="text-align: center"> <button type="button"
                    class="btn btn-danger btnDeleteStudent" data-id="'.$student->id.'">Delete</button> </td>
            <td style="text-align: center"><button type="button"
                    class="btn btn-primary btnModifyStudent" data-id="'.$student->id.'">Modify</button> </td>
        </tr>';
        }
        return $output;
        }else{
            $students = Student::where("student_name", "like", $key_search)->where("class_id", $selectedValue)->get();
            $output = '';
            foreach($students as $student){
                $output .= '<tr>
                <th scope="row">'. $student->id .'</th>
                <td colspan="1">'.$student->student_name.'</td>
                <td colspan="1">'. $student->classStudent->class_name .'</td>
                <td colspan="1">'. $student->student_email .'</td>
                <td colspan="1">'. $student->student_phone .'</td>
                <td style="text-align: center"> <button type="button"
                        class="btn btn-danger btnDeleteStudent" data-id="'.$student->id.'">Delete</button> </td>
                <td style="text-align: center"><button type="button"
                        class="btn btn-primary btnModifyStudent" data-id="'.$student->id.'">Modify</button> </td>
            </tr>';
            }
            return $output;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
