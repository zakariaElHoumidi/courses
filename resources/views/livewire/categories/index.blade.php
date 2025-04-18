<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This category cannot be deleted because it is still linked to one or more concepts. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>Categories</h3>

        <button class="btn btn-primary btn-sm" wire:click="createCategory">
            <i class="fa-solid fa-plus"></i>
            <span>Add Category</span>
        </button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Label</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th>{{ $category->label }}</th>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" wire:click='editCategory({{ $category }})'>
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" wire:click='deleteCategory({{ $category }})'>
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($showModalStore)
        <livewire:categories.store />
    @endif

    @if ($showModalUpdate)
        <livewire:categories.edit :category="$category"/>
    @endif
</div>
