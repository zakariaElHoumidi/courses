<?php

namespace App\Livewire\Lessons;

use App\Models\Lesson;
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

    public ?int $lesson_id;

    public string $search = "", $mode_sort = 'desc';

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getLessons();
    }

    private function getLessons()
    {
        $query = Lesson::where('user_id', $this->user->id);

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        $lesson_exist = $query->exists();

        if ($lesson_exist) {
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
        $this->getLessons();
    }

    public function resetSearch(): void {
        $this->search = "";
        $this->getLessons();
    }

    #[On(['lesson-added', 'lesson-updated'])]
    public function refreshLessons(): void
    {
        $this->getLessons();
    }

    public function createLesson(): void
    {
        $this->showModalStore = true;
    }

    public function editLesson(int $id): void
    {
        $this->lesson_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-lesson-store')]
    public function toggleModalStore(): void
    {
        $this->showModalStore = !$this->showModalStore;
    }

    #[On('modal-lesson-update')]
    public function toggleModalUpdate(): void
    {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deleteLesson(int $id): void
    {
        try {
            $lesson = Lesson::find($id);

            if (!$lesson) {
                return;
            }
            $lesson->delete();

            $this->refreshLessons();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function changeModeSort(): void {
        $this->mode_sort = $this->mode_sort == 'asc' ? 'desc' : 'asc';
        $this->getLessons();
    }

    public function render()
    {
        return view('livewire.lessons.index', [
            'lessons' => $this->getLessons()
        ]);
    }
}
