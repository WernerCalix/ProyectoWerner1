<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacione
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $cantidad_comentarios
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Publicacione extends Model
{
    use HasFactory;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['titulo', 'descripcion', 'cantidad_comentarios'];


}
