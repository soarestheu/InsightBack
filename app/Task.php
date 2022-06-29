<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    
    protected $fillable = [
        'nome', 'data_conclusao', 'status',
    ];

}
