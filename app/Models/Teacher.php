<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'full_name',
        'date_of_birth',
        'mobile',
        'joining_date',
        'formation',
        'username',
        'address',
        'city',
        'state',
        'zip_code',
    ];
}
