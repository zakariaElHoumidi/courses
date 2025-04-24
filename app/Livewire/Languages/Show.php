<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public Language $language;

    public ?int $language_id;

    public bool $showModalUpdate = false, $cannotDelete = false;


    public function mount(int $id): void
    {
        $this->language = Language::find($id);
    }

    public function editLanguage(int $id): void
    {
        $this->language_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-language-update')]
    public function toggleModalUpdate(): void
    {
        $this->showModalUpdate = !$this->showModalUpdate;
    }

    public function deleteLanguage(int $id): void
    {
        try {
            $language = Language::find($id);

            if (!$language) {
                return;
            }
            $language->delete();

            $route = route('languages.index');

            $this->redirect($route, navigate: true);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.languages.show');
    }
}
