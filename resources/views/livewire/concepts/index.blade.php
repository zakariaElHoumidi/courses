<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This concept cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>Concepts</h3>

        <button class="btn btn-primary btn-sm" wire:click="createConcept">
            <i class="fa-solid fa-plus"></i>
            <span>Add Concept</span>
        </button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Label</th>
                <th>Description</th>
                <th>Category</th>
                <th>Language</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($concepts as $concept)
                <tr>
                    <td>{{ $concept->label }}</td>
                    <td>{{ $concept->description }}</td>
                    <td>{{ $concept->category->label }}</td>
                    <td>{{ $concept->language->label }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" wire:click='editConcept({{ $concept->id }})'>
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" wire:click='deleteConcept({{ $concept->id }})'>
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No concepts found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($showModalStore)
        <livewire:concepts.store />
    @endif

    @if ($showModalUpdate)
        <livewire:concepts.edit :id="$concept_id"/>
    @endif
</div>
