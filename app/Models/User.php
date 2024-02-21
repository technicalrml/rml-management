<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'gender',
        'phone_number',
        'address',
        'role_id',
    ];

    public function getRole()
    {
        return $this->join('role', 'user.role_id', '=', 'role.role_id')
            ->select('user.*', 'role.role_id', 'role.role')
            ->get();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->user_id = 'USR' . str_pad(static::count() + 1, 3, '0', STR_PAD_LEFT);
        });
    }
}
