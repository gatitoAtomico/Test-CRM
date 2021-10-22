<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephones extends Model
{
    //
    protected $fillable = [
        'number', 'user_id'
    ];
}
