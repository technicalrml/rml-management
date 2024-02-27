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
//    protected $fillable = ['status', 'price'];

    public static function getAllTicketsWhere($ticket_number)
    {
        return static::where($ticket_number)->get();
    }
}
