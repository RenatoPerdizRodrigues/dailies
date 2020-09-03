<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Daily extends Model
{   
    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = []){
        /**
         * Recebemos os parâmetros de criação
         *  */
        parent::__construct($attributes);

        /**
         * Settamos o usuário logado, e a task é sempre criada como não finalizada
         */
        $this->user_id = Auth::user()->id;
        $this->done = 0;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'task_id'
    ];

    /**
     * Mutators
     */
    public function setDateAttribute($value){
        $this->attributes['date'] = dataParaAmericana($value);
    }

}