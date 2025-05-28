<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paso extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pasos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ESTADO_SELECT = [
        '1' => 'Recibido',
        '2' => 'En proceso',
        '3' => 'Cancelado',
        '4' => 'Terminado',
    ];

    protected $fillable = [
        'flujo_id',
        'orden',
        'descripcion',
        'requisitos_aceptacion',
        'duracion_aproximada',
        'empleado_id',
        'requisitos_liberacion',
        'estado',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function flujo()
    {
        return $this->belongsTo(Flujo::class, 'flujo_id');
    }

    public function empleado()
    {
        return $this->belongsTo(AgregarEmpleado::class, 'empleado_id');
    }
}
