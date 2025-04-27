<?php

namespace App\Livewire\PartLessons;

use App\Models\LessonPart;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public User $user;
    public bool $showModalStore = false;
    public bool $showModalUpdate = false;
    public bool $cannotDelete = false;

    public ?int $part_lesson_id;

    public string $search = "", $mode_sort = 'desc';

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getPartLessons();
    }

    private function getPartLessons()
    {
        $query = LessonPart::where('user_id', $this->user->id);

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        $lesson_part_exist = $query->exists();

        if ($lesson_part_exist) {
            if ($this->mode_sort == 'desc') {
                $query->latest();
            } else {
                $query->oldest();
            }
        }

        return $query->paginate(5);
    }

    public function updatedSearch()
    {
        $this->getPartLessons();
    }

    public function resetSearch(): void {
        $this->search = "";
        $this->getPartLessons();
    }

    #[On(['part-lesson-added', 'part-lesson-updated'])]
    public function refreshLessons(): void
    {
        $this->getPartLessons();
    }

    public function createPartLesson(): void
    {
        $this->showModalStore = true;
    }

    #[On('modal-part-lesson-store')]
    public function toggleModalStore(): void
    {
        $this->showModalStore = !$this->showModalStore;
    }

    #[On('modal-part-lesson-update')]
    public function toggleModalUpdate(): void
    {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function changeModeSort(): void {
        $this->mode_sort = $this->mode_sort == 'asc' ? 'desc' : 'asc';
        $this->getPartLessons();
    }

    public function render()
    {
        return view('livewire.part-lessons.index', [
            'part_lessons' => $this->getPartLessons()
        ]);
    }
}
