<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $imagen
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $categoriaid
 * @property $estadopromocionid
 * @property $Precio_promocion
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Estadopromocione $estadopromocione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'imagen' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'categoriaid' => 'required',
		'estadopromocionid' => 'required',
		'Precio_promocion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['imagen','nombre','descripcion','precio','categoriaid','estadopromocionid','Precio_promocion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'id', 'categoriaid');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadopromocione()
    {
        return $this->hasOne('App\Estadopromocione', 'id', 'estadopromocionid');
    }
    

}
