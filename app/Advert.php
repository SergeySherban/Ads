<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $guarded = [''];
	protected $fillabel = ['title', 'poster', 'description', 'author'];
}
