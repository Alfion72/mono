<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Mono;

class Venta extends Model
{
    protected $fillable = ['cliente_id', 'mono_id', 'ativo'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function mono() {
        return $this->belongsTo(Mono::class);
    }
}
