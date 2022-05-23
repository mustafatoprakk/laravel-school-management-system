<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $table = "classes";
    protected $primaryKey = "id";
    protected $fillable = [
        "name", "teacher_id", "student_id"
    ];
    protected $casts = [
        "student_id" => "array",
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
