<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Candidate extends Model
class Candidate extends Authenticatable
{
    use HasFactory;

    protected $table = 'candidates';
    
    protected $fillable=[
        'email',
        'phone',
        'country',
        'img_path',
    ];
}
