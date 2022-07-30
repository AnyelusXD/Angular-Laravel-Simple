<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    use HasFactory;

    public $table = 'aplications';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user',
        'name',
        'lastname',
        'typeId',
        'numId',
        'birthdate',
        'password'

    ];

    /**
    *The attributes that should be casted to native types.
    *
    *@var array
    */
    protected $cast = [
        'id' => 'integer',
        'user' => 'string',
        'name' => 'string',
        'lastname' => 'string',
        'typeId' => 'string',
        'numId' => 'string',
        'birthdate' => 'date',
        'password' => 'string'
    ];

    /**
     * Validation rules
     * 
     *@var array
    */
    public static $rules = [
        'user' => 'required|string|max:45',
        'name' => 'required|string|max:45',
        'lastname' => 'required|string|max:255',
        'typeId' => 'required|string|max:45',
        'numId' => 'required|string|max:45',
        'birthdate' => 'required|date|max:255',
        'password' => 'required|string|max:255'
    ];
}
