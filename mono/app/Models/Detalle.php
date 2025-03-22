<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mono;

class Detalle extends Model {

    protected $fillable = ['id_venta', 'id_mono', 'cantidad', 'precio'];

    public function mono() {
        return $this->belongsTo(Mono::class);
    }
}
