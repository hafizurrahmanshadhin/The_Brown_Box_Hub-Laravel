<?php

namespace App\Models;

use App\Models\SubscriptionFeature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'deadline',
        'status',
    ];

    protected function casts(): array {
        return [
            'id'          => 'integer',
            'name'        => 'string',
            'description' => 'string',
            'price'       => 'decimal:2',
            'deadline'    => 'string',
            'status'      => 'string',
            'created_at'  => 'datetime',
            'updated_at'  => 'datetime',
            'deleted_at'  => 'datetime',
        ];
    }

    public function features(): HasMany {
        return $this->hasMany(SubscriptionFeature::class);
    }
}
