<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstName',
        'lastName',
        'phone_number',
        'Message',
    ];

    protected function casts(): array {
        return [
            'id'           => 'integer',
            'firstName'    => 'string',
            'lastName'     => 'string',
            'phone_number' => 'string',
            'Message'      => 'string',
            'status'       => 'string',
            'created_at'   => 'datetime',
            'updated_at'   => 'datetime',
            'deleted_at'   => 'datetime',
        ];
    }
}
