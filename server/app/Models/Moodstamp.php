<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Moodstamp extends Model
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
        $this->date = date('Y-m-d');
        $this->time = date('H:i:s');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mood', 'description',
    ];
}