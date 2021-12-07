<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role () {
        return $this->belongsTo(Role::class);
    }

    public function isAcLand () {
        return $this->role_id == 1;
    }
    public function isTowsilder () {
        return $this->role_id == 2;
    }
    public function isUno () {
        return $this->role_id == 3;
    }
    public function isDc () {
        return $this->role_id == 4;
    }
    public function isAdc () {
        return $this->role_id == 5;
    }
    public function isAdcRevinew () {
        return $this->role_id == 6;
    }

    public static function generateUser() {
        $users = [
            [
                'name' => "acland",
                'email' => "acland@mail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role_id' => '1',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "toshil",
                'email' => "toshil@mail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role_id' => '2',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "uno",
                'email' => "uno@mail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role_id' => '3',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "dc",
                'email' => "dc@mail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role_id' => '4',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "rdc",
                'email' => "rdc@mail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role_id' => '5',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "rdcrevinew",
                'email' => "rdcrevinew@mail.com",
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'role_id' => '6',
                'remember_token' => Str::random(10),
            ],
        ];

        foreach($users as $user) {
            self::create($user);
        }
    }

}
