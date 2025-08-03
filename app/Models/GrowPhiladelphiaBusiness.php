<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrowPhiladelphiaBusiness extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'image',
        'sub_description',
        'status',
    ];

    protected function casts(): array {
        return [
            'id'              => 'integer',
            'title'           => 'string',
            'description'     => 'string',
            'image'           => 'string',
            'sub_description' => 'array',
            'status'          => 'string',
            'created_at'      => 'datetime',
            'updated_at'      => 'datetime',
            'deleted_at'      => 'datetime',
        ];
    }
}
