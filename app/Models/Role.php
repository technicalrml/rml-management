<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'role',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->role_id = 'RL' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
