<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $categoria_id
 * @property $nombre
 * @property $descripcion
 * @property $stock
 * @property $precio
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property CompraProducto[] $compraProductos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['categoria_id', 
    'unidad_medida_id', 
    'nombre', 
    'descripcion', 
    'stock', 
    'precio', 
    'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id', 'id');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(\App\Models\UnidadMedida::class, 'unidad_medida_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compraProductos()
    {
        return $this->hasMany(\App\Models\CompraProducto::class, 'id', 'producto_id');
    }
    
}
