<?php

namespace App\Livewire\Lessons;

use App\Models\Lesson;
use App\Models\LessonPart;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public Lesson $lesson;

    public ?int $lesson_id, $part_lesson_id;

    public bool $showModalUpdate = false, $cannotDelete = false, $showModalUpdate_part = false;


    public function mount(int $id): void
    {
        $this->lesson = Lesson::find($id);
    }

    public function editLesson(int $id): void
    {
        $this->lesson_id = $id;
        $this->showModalUpdate = true;
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

            $route = route('lessons.index');

            $this->redirect($route, navigate: true);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function disengagementLessonPart(int $id)
    {
        $lesson_part = LessonPart::find($id);

        if (!$lesson_part) {
            return;
        }
        $lesson_part->update([
            'lesson_id' => null
        ]);
    }

    public function editPartLesson(int $id): void
    {
        $this->part_lesson_id = $id;
        $this->showModalUpdate_part = true;
    }

    public function deletePartLesson(int $id): void
    {
        try {
            $part_lesson = LessonPart::find($id);

            if (!$part_lesson) {
                return;
            }
            $part_lesson->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.lessons.show');
    }
}
