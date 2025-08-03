<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSetting extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'system_name',
        'email',
        'phone_number',
        'calendly_link',
        'address',
        'copyright_text',
        'description',
        'logo',
        'favicon',
        'status',
    ];

    protected function casts(): array {
        return [
            'id'             => 'integer',
            'title'          => 'string',
            'system_name'    => 'string',
            'email'          => 'string',
            'phone_number'   => 'string',
            'calendly_link'  => 'string',
            'address'        => 'string',
            'copyright_text' => 'string',
            'description'    => 'string',
            'logo'           => 'string',
            'favicon'        => 'string',
            'status'         => 'string',
            'created_at'     => 'datetime',
            'updated_at'     => 'datetime',
            'deleted_at'     => 'datetime',
        ];
    }
}
