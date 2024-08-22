<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'direccion_manzana',
        'direccion_calle_principal',
        'direccion_numero',
        'direccion_transversal',
        'direccion_referencia',
        'administrador',
        'telefonos_contacto',
        'email_contacto',
        'ubicacion',
        'id_provincia',
        'id_ciudad',
        'id_zona',
        'id_canal',
        'id_subcanal',
        'id_cadena',
        'en_ruta',
        'cliente_proyecto_id'
    ];
}
