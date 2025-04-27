<?php

namespace App\Models;

use App\Observers\LessonPartObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(LessonPartObserver::class)]
class LessonPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'title',
        'content',
        'order',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function lesson(): BelongsTo {
        return $this->belongsTo(Lesson::class);
    }
}
