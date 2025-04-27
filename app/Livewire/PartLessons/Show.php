<?php

namespace App\Livewire\PartLessons;

use App\Models\LessonPart;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public LessonPart $lesson_part;

    public ?int $lesson_part_id;

    public bool $showModalUpdate = false, $cannotDelete = false;


    public function mount(int $id): void {
        $this->lesson_part = LessonPart::find($id);
    }

    public function editPartLesson(int $id): void
    {
        $this->lesson_part_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-part-lesson-update')]
    public function toggleModalUpdate(): void
    {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deletePartLesson(int $id): void
    {
        try {
            $lesson_part = LessonPart::find($id);

            if (!$lesson_part) {
                return;
            }
            $lesson_part->delete();

            $route = route('lessons-parts.index');

            $this->redirect($route, navigate: true);

        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.part-lessons.show');
    }
}
