<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UnidadMedida
 *
 * @property $id
 * @property $nombre
 * @property $abreviatura
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UnidadMedida extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'abreviatura','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany(\App\Models\Producto::class, 'id', 'unidad_medida_id');
    }
    
}
