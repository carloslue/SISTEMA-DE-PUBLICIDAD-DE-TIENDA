<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estadopromocione
 *
 * @property $id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estadopromocione extends Model
{
    
    static $rules = [
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'estadopromocionid', 'id');
    }
    

}
