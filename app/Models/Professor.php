<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = [
        'name',
        'lastName',
        'email',
        'phone',
        'curso_id'
    ];

    public function curso() {
        return $this->belongsTo(Curso::class);
    }
}
