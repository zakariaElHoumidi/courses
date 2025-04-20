<?php

namespace App\Models;

use App\Observers\LanguageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(LanguageObserver::class)]
class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
