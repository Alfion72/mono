<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mono;

class Detalle extends Model {

    protected $fillable = ['venta_id', 'mono_id', 'cantidad', 'precio','total', 'ativo'];

    public function mono() {
        return $this->belongsTo(Mono::class);
    }

    public function venta() {
        return $this->belongsTo(Venta::class);
    }
}
