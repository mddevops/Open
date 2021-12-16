<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $table = 'notebooks';
    protected $dates = [
        'updated_at',
        'created_at'
    ];
    protected $fillable = [
        'fio',
        'phone_number',
        'email',
        'birthdate',
        'image'
    ];
    /**
     * @var mixed
     */
    private $image;
}
