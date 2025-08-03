<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionFeature extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subscription_id',
        'feature_name',
        'status',
    ];

    protected function casts(): array {
        return [
            'id'              => 'integer',
            'subscription_id' => 'integer',
            'feature_name'    => 'string',
            'status'          => 'string',
            'created_at'      => 'datetime',
            'updated_at'      => 'datetime',
            'deleted_at'      => 'datetime',
        ];
    }

    public function subscription(): BelongsTo {
        return $this->belongsTo(Subscription::class);
    }
}
