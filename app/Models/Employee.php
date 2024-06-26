<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'firstname',
        'middlename',
        'lastname',
        'address',
        'suffix',
       
        'age',
        'gender',
       
        'contact_number',
       
        'image'
    ];
}
