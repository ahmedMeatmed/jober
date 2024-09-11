<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


// class Employer extends Model
class Employer extends Authenticatable

{
    use HasFactory;

    protected $table = 'employers';

    protected $fillable =[
        'name',
        'email',
        'industry',
        'country',
        'postalcode',
        'taxcard',
        'commercial_register',
        'img_path',

    ];
}
