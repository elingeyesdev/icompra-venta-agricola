<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $proveedor_id
 * @property $fecha_compra
 * @property $total_compra
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Proveedore $proveedore
 * @property CompraProducto[] $compraProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['proveedor_id', 'fecha_compra', 'total_compra', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proveedore()
    {
        return $this->belongsTo(\App\Models\Proveedore::class, 'proveedor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compraProductos()
    {
        return $this->hasMany(\App\Models\CompraProducto::class, 'id', 'compra_id');
    }
    
}
