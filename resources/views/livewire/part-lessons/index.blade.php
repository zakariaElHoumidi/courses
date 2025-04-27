<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This part lesson cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>Part Lessons</h3>

        <button class="btn btn-primary btn-sm" wire:click="createPartLesson">
            <i class="fa-solid fa-plus"></i>
            <span>Add Part Lesson</span>
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
                <th>Lesson</th>
                <th>Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($part_lessons as $lesson_part)
                <tr>
                    <td>{{ $lesson_part->title }}</td>
                    <td>{{ \Str::limit($lesson_part->content, 100) }}</td>
                    <td>{{ $lesson_part->lesson->title }}</td>
                    <td>
                        <span class="badge text-bg-primary">{{ $lesson_part->order }}</span>
                    </td>
                    <td>
                        <a class="btn btn-outline-info btn-sm" href="{{ route('lessons-parts.show', $lesson_part->id) }}"
                            wire:navigate>
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No part lessons found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $part_lessons->links() }}

    @if ($showModalStore)
        <livewire:part-lessons.store />
    @endif

    @if ($showModalUpdate)
        <livewire:part-lessons.edit :id="$part_lesson_id" />
    @endif
</div>
