<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This part lesson cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Part Lesson : <span class="text-primary">{{ $lesson_part->title }}</span>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    Lesson : <span class="text-primary">
                        <a href="{{ route('lessons.show', $lesson_part->lesson->id) }}" wire:navigate>
                            {{ $lesson_part->lesson->title }}
                        </a>
                    </span>
                </li>
            </ul>
        </div>

        <div class="card-footer text-body-secondary">
            <button class="btn btn-outline-primary btn-sm" wire:click='editPartLesson({{ $lesson_part->id }})'>
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-outline-danger btn-sm" wire:click='deletePartLesson({{ $lesson_part->id }})'>
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>

    @if ($showModalUpdate)
        <livewire:part-lessons.edit :id="$lesson_id" />
    @endif
</div>
