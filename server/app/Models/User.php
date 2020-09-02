<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Setta a senha do usuário com encriptação
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = app('hash')->make($password);
    }

    /**
     * Captura o identificador
     */
    public function getJWTIdentifier(){ 
        return $this->getKey();
    }

    /**
     * Retorna os custom clains?? 
     * */
    public function getJWTCustomClaims(){ 
        return [];
    }

    /**
     * Scope de busca
     */
    public function scopeFields($query, $fields) {
        return $query->when($fields['name'] != '', function($q) use($fields){
            return $q->where('name', $fields['name']);
        })->when($fields['email'] != '', function($q) use($fields){
            return $q->where('email', $fields['email']);
        });
    }
}
