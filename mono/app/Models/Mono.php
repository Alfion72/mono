<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mono extends Model
{
    protected $fillable = ['nombre', 'color', 'tamano', 'precio', 'ativo'];
}
