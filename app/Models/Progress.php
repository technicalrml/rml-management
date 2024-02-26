<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Progress extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'ticket';
    protected $fillable = ['name', 'price'];
}