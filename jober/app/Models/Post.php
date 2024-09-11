<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'responses',
        'requires',
        'qualifications',
        'salary',
        'benefits',
        'location',
        'work_type',
        'deadline',
        'employer_id',
        'admin_id',
        'approval',
    ];
}
