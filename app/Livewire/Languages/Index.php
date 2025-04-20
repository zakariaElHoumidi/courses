<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Collection $languages;
    public User $user;
    public bool $showModalStore = false;
    public bool $showModalUpdate = false;
    public bool $cannotDelete = false;

    public ?int $language_id;

    public string $search = "", $mode_sort = 'desc';

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->getLanguages();
    }

    private function getLanguages(): void
    {
        $query = Language::where('user_id', $this->user->id);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('label', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $language_exist = $query->exists();

        if ($language_exist) {
            if ($this->mode_sort == 'desc') {
                $query->latest();
            } else {
                $query->oldest();
            }

            $this->languages = $query->get();
        } else {
            $this->languages = new Collection();
        }
    }

    public function updatedSearch()
    {
        $this->getLanguages();
    }

    public function resetSearch(): void {
        $this->search = "";
        $this->getLanguages();
    }

    #[On(['language-added', 'language-updated'])]
    public function refreshLanguages(): void
    {
        $this->getLanguages();
    }

    public function createLanguage(): void
    {
        $this->showModalStore = true;
    }

    public function editLanguage(int $id): void
    {
        $this->language_id = $id;
        $this->showModalUpdate = true;
    }

    #[On('modal-language-store')]
    public function toggleModalStore(): void
    {
        $this->showModalStore = !$this->showModalStore;
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

            $this->refreshLanguages();
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->cannotDelete = true;
            }
        }
    }

    public function changeModeSort(): void {
        $this->mode_sort = $this->mode_sort == 'asc' ? 'desc' : 'asc';
        $this->getLanguages();
    }

    public function render()
    {
        return view('livewire.languages.index');
    }
}
