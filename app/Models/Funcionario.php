<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;

    //Define quais campos do 'mass assignment' serão disponibilizados
    protected $fillable = ['nome', 'cargo', 'salario'];
}
