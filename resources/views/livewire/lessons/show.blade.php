<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This lesson cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Lesson : <span class="text-primary">{{ $lesson->title }}</span>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    Concept : <span class="text-primary">
                        <a href="{{ route('concepts.show', $lesson->concept->id) }}" wire:navigate>
                            {{ $lesson->concept->label }}
                        </a>
                    </span>
                </li>
            </ul>

            <div class="part-lessons my-3">
                <h4>Part Lessons</h4>

                <ul class="list-group">
                    @forelse ($lesson->lessonParts as $lesson_part)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            {{ $lesson_part->title }}

                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <button class="btn btn-outline-danger btn-sm"
                                            wire:click='disengagementLessonPart({{ $lesson_part->id }})'>
                                            <i class="fa-solid fa-trash"></i>

                                            Disengagement Part Lesson
                                        </button>
                                    </li>
                                    <li class="dropdown-item">
                                        <button class="btn btn-outline-danger btn-sm"
                                            wire:click='deletePartLesson({{ $lesson_part->id }})'>
                                            <i class="fa-solid fa-trash"></i>

                                            Delete Part Lesson
                                        </button>
                                    </li>
                                    <li class="dropdown-item">
                                        <button class="btn btn-outline-primary btn-sm"
                                            wire:click='editPartLesson({{ $lesson_part->id }})'>
                                            <i class="fa-solid fa-pen"></i>

                                            Edit Part Lesson
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">No Part Lesson belongs to {{ $lesson->title }}</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="card-footer text-body-secondary">
            <button class="btn btn-outline-primary btn-sm" wire:click='editLesson({{ $lesson->id }})'>
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-outline-danger btn-sm" wire:click='deleteLesson({{ $lesson->id }})'>
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>

    @if ($showModalUpdate)
        <livewire:lessons.edit :id="$lesson_id" />
    @endif

    @if ($showModalUpdate_part)
    
        <livewire:part-lessons.edit :id="$part_lesson_id" />
    @endif
</div>
