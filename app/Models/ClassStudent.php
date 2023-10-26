<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['class_name', 'class_desc', 'class_major'];
    protected $primaryKey =  'id'; /* Khóa Chính */
    protected $table = 'class_student'; 
}
