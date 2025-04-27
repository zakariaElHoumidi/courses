<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This lesson cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>Lessons</h3>

        <button class="btn btn-primary btn-sm" wire:click="createLesson">
            <i class="fa-solid fa-plus"></i>
            <span>Add Lesson</span>
        </button>
    </div>

    <div class="my-2">
        <input type="search" class="form-control shadow-sm" placeholder="Search"
            wire:model.live.debounce.250ms="search">
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Title
                    <button class="btn btn-sm" wire:click='changeModeSort()'>
                        <i class="fa-solid fa-arrow-{{ $mode_sort == 'asc' ? 'down' : 'up' }}-wide-short"></i>
                    </button>
                </th>
                <th>Content</th>
                <th>Concept</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->title }}</td>
                    <td>{{ \Str::limit($lesson->content, 100) }}</td>
                    <td>{{ $lesson->concept->label }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" wire:click='editLesson({{ $lesson->id }})'>
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" wire:click='deleteLesson({{ $lesson->id }})'>
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <a class="btn btn-outline-info btn-sm" href="{{ route('lessons.show', $lesson->id) }}"
                            wire:navigate>
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No lessons found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $lessons->links() }}

    @if ($showModalStore)
        <livewire:lessons.store />
    @endif

    @if ($showModalUpdate)
        <livewire:lessons.edit :id="$lesson_id" />
    @endif
</div>
