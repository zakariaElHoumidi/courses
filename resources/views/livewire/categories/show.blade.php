<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This category cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Category : <span class="text-primary">{{ $category->label }}</span>
        </div>

        <div class="card-body">
            <h4>Concepts</h4>

            @if ($category->concepts->count() > 0)

                <ul class="list-group">
                    @forelse ($category->concepts as $concept)
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            {{ $concept->label }}

                            <button class="btn btn-outline-danger btn-sm" wire:click='disengagementConcept({{ $concept->id }})'>
                                <i class="fa-solid fa-trash"></i>

                                Disengagement Concept
                            </button>
                        </li>
                    @empty
                        <li class="list-group-item">No concepts belongs to {{ $category->label }}</li>
                    @endforelse
                </ul>
            @endif
        </div>

        <div class="card-footer text-body-secondary">
            <button class="btn btn-outline-primary btn-sm" wire:click='editCategory({{ $category->id }})'>
                <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-outline-danger btn-sm" wire:click='deleteCategory({{ $category->id }})'>
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    </div>


    @if ($showModalUpdate)
        <livewire:categories.edit :id="$category_id" />
    @endif
</div>
