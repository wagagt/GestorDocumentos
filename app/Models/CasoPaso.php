<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CasoPaso extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'caso_pasos';

    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_ACTUAL_SELECT = [
        '1' => 'Activo',
        '2' => 'En proceso',
        '3' => 'Terminado',
        '4' => 'Cancelado',
    ];

    protected $fillable = [
        'caso_id',
        'paso_id',
        'status_actual',
        'fecha_inicio',
        'fecha_fin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function caso()
    {
        return $this->belongsTo(AgregarCaso::class, 'caso_id');
    }

    public function paso()
    {
        return $this->belongsTo(Paso::class, 'paso_id');
    }

    public function getFechaInicioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinAttribute($value)
    {
        $this->attributes['fecha_fin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
