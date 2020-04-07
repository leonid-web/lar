<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Razdel extends Model
{
    protected $fillable = [
        'title', 'user_id', 'created_at', 'updated_at'
    ];
}
