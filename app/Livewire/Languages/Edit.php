<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    #[Validate('required|min:3')]
    public string $label;
    #[Validate('required|between:5,255')]
    public string $description;

    public Language $language;

    public function mount(int $id): void {
        $language = Language::find($id);

        if (!$language) {
            return;
        }
        $this->language = $language;
        $this->label = $language->label;
        $this->description = $language->description;
    }

    public function updateLanguage() {
        $this->validate();

        $this->language->label = $this->label;
        $this->language->description = $this->description;
        $this->language->save();

        $this->reset([
            'label',
            'description'
        ]);

        $this->dispatch('language-added');
        $this->modalToggle();
    }

    public function modalToggle(): void {
        $this->dispatch('modal-language-update');
    }

    public function render()
    {
        return view('livewire.languages.edit');
    }
}
