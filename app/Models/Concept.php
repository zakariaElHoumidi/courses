<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Concept extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'description',
        'user_id',
        'category_id',
        'language_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function language(): BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
