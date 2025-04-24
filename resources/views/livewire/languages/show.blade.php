<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This language cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Language : <span class="text-primary">{{ $language->label }}</span>
        </div>

        <div class="card-body">
            <p class="mb-0">{{ $language->description }}</p>
        </div>

        <div class="card-footer text-body-secondary">
            <button class="btn btn-outline-primary btn-sm" wire:click='editLanguage({{ $language->id }})'>
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-outline-danger btn-sm" wire:click='deleteLanguage({{ $language->id }})'>
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>

    @if ($showModalUpdate)
        <livewire:languages.edit :id="$language_id" />
    @endif
</div>
