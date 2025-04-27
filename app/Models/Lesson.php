<?php

namespace App\Models;

use App\Observers\LessonObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(LessonObserver::class)]
class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'concept_id',
        'title',
        'content',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function concept(): BelongsTo {
        return $this->belongsTo(Concept::class);
    }

    public function lessonParts(): HasMany {
        return $this->hasMany(LessonPart::class);
    }
}
