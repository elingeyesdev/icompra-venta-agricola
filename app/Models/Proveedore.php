<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 *
 * @property $id
 * @property $nombre
 * @property $correo
 * @property $telefono
 * @property $direccion
 * @property $razon_social
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Compra[] $compras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedore extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'correo', 'telefono', 'direccion', 'razon_social', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compras()
    {
        return $this->hasMany(\App\Models\Compra::class, 'id', 'proveedor_id');
    }
    
}
