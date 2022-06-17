<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provedor
 *
 * @property $id
 * @property $user_id
 * @property $nombre
 * @property $direccion
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuenta[] $cuentas
 * @property Pago[] $pagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provedor extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'nombre' => 'required',
		'direccion' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','nombre','direccion','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentas()
    {
        return $this->hasMany('App\Models\Cuenta', 'provedor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'provedor_id', 'id');
    }
    

}
