<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adjunto extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'adjuntos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'caso_id',
        'nombre',
        'tipo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPO_SELECT = [
        'imagen'  => 'Imagen',
        'soporte' => 'Soporte',
        'excel'   => 'Excel',
        'etc'     => 'etc',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function caso()
    {
        return $this->belongsTo(AgregarCaso::class, 'caso_id');
    }
}
