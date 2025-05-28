<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgregarCaso extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'agregar_casos';

    protected $dates = [
        'fecha_creacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'descripcion',
        'flujo_id',
        'fecha_creacion',
        'encargado_id',
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

    public function getFechaCreacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaCreacionAttribute($value)
    {
        $this->attributes['fecha_creacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function encargado()
    {
        return $this->belongsTo(AgregarEmpleado::class, 'encargado_id');
    }
}
