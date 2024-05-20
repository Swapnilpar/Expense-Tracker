<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
        protected $table = 'incomes';
        protected $fillable = ['description', 'price', 'date'];

}