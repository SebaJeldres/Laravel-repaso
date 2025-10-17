<?php

namespace App\Models;

//Se importa la clase HasFactory ppara generar datos de prueba automaticamente usando por ejemplo "Usuario::factory()->count(10)->create(); para crear 10 usuarios de prueba"
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'proveedor',
        'monto',
        'fecha'
    ];
}
