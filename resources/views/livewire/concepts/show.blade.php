<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This concept cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Concept : <span class="text-primary">{{ $concept->label }}</span>
        </div>

        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    Language : <span class="text-primary">
                        <a href="{{ route('languages.show', $concept->language->id) }}" wire:navigate>
                            {{ $concept->language->label }}
                        </a>
                    </span>
                </li>

                <li class="list-group-item">
                    Category : <span class="text-primary">
                        <a href="{{ route('categories.show', $concept->category->id) }}" wire:navigate>
                            {{ $concept->category->label }}
                        </a>
                    </span>
                </li>
            </ul>
        </div>

        <div class="card-footer text-body-secondary">
            <button class="btn btn-outline-primary btn-sm" wire:click='editConcept({{ $concept->id }})'>
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-outline-danger btn-sm" wire:click='deleteConcept({{ $concept->id }})'>
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>

    @if ($showModalUpdate)
        <livewire:concepts.edit :id="$concept_id" />
    @endif
</div>
