<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'customer',

    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->customer_id = 'CS' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
