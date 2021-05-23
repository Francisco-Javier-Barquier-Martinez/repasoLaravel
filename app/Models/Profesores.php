<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidos', 'email', 'localidad'];

    public function asignaturas()
    {
        return $this->hasMany(asignaturas::class);
    }

    public static function getArrayIdNombre()
    {
        $profe = Profesores::orderBy('nombre')->get();
        $miArray = [];
        foreach ($profe as $item) {
            $miArray[$item->id] = $item->nombre;
        }
        return $miArray;
    }
}
