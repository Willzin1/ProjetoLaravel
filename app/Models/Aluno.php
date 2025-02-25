<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'phone',
        'birthDate',
        'weight',
        'height'
    ];
}
