<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignaturas extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','creditos', 'profesor_id'];

    public function profesor(){
        return $this->belongsTo(Profesores::class);
    }
}

