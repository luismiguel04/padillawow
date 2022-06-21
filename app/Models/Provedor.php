<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
		
		'nombre' => 'required',
		'direccion' => 'required',
		
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
        return $this->hasMany('App\Models\Cuenta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'provedor_id', 'id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function subcateegorias()
    {
        return $this->hasMany('App\Cuenta');
    }

}
