<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['student_name', 'student_phone', 'student_email', 'class_id'];
    protected $primaryKey =  'id'; /* Khóa Chính */
    protected $table = 'student'; 

    public function classStudent(){
        return $this->belongsTo('App\Models\ClassStudent','class_id'); /* Lấy id của model Category so sánh với category_id */
    }
}
