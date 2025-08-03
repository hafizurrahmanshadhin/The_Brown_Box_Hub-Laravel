<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'otp_verified_at',
    ];

    protected function casts(): array {
        return [
            'id'                   => 'integer',
            'email_verified_at'    => 'datetime',
            'otp_verified_at'      => 'datetime',
            'password'             => 'hashed',
            'firstName'            => 'string',
            'lastName'             => 'string',
            'email'                => 'string',
            'phone_number'         => 'string',
            'avatar'               => 'string',
            'cover_photo'          => 'string',
            'address'              => 'string',
            'unit_or_apartment'    => 'string',
            'zip_code'             => 'string',
            'google_id'            => 'string',
            'facebook_id'          => 'string',
            'apple_id'             => 'string',
            'role'                 => 'string',
            'status'               => 'string',
            'terms_and_conditions' => 'boolean',
            'created_at'           => 'datetime',
            'updated_at'           => 'datetime',
            'deleted_at'           => 'datetime',
        ];
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array {
        return [];
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
