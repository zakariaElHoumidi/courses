<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Store extends Component
{
    #[Validate('required|min:3')]
    public string $label;
    #[Validate('required|between:5,255')]
    public string $description;

    public function storeLanguage() {
        $this->validate();

        $language = new Language();

        $language->label = $this->label;
        $language->description = $this->description;
        $language->save();

        $this->reset([
            'label',
            'description',
        ]);

        $this->dispatch('language-added');
        $this->modalToggle();
    }

    public function modalToggle(): void {
        $this->dispatch('modal-language-store');
    }

    public function render()
    {
        return view('livewire.languages.store');
    }
}
