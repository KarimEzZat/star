<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name', 'location', 'description', 'photo', 'facebook', 'twitter', 'phone','keywords'];
}
