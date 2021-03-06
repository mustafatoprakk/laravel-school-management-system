<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teachers";
    protected $primaryKey = "id";
    protected $fillable = [
        "name", "surname", "email", "password", "branch", "birth_date"
    ];

    public function classes()
    {
        return $this->hasMany(StudentClass::class);
    }
}
