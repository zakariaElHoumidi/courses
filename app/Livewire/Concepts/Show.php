<?php

namespace App\Livewire\Concepts;

use App\Models\Concept;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public Concept $concept;

    public ?int $concept_id;

    public bool $showModalUpdate = false, $cannotDelete = false;


    public function mount(int $id): void {
        $this->concept = Concept::find($id);
    }

    public function editConcept(int $id): void
    {
        $this->concept_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-concept-update')]
    public function toggleModalUpdate(): void
    {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deleteConcept(int $id): void
    {
        try {
            $concept = Concept::find($id);

            if (!$concept) {
                return;
            }
            $concept->delete();

            $route = route('concepts.index');

            $this->redirect($route, navigate: true);

        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.concepts.show');
    }
}
