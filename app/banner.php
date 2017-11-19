<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $fillable = ['name', 'description', 'link', 'image'];
}
