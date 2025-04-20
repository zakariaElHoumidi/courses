<div>
    @if ($cannotDelete)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            This language cannot be deleted because it is still linked to one or more ??. Please delete them
            first .
            <button type="button" class="btn-close" wire:click='$set("cannotDelete", false)'></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>Languages</h3>

        <button class="btn btn-primary btn-sm" wire:click="createLanguage">
            <i class="fa-solid fa-plus"></i>
            <span>Add Language</span>
        </button>
    </div>

    <div class="my-2">
        <input type="search" class="form-control shadow-sm" placeholder="Search"
            wire:model.live.debounce.250ms="search">
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Label
                    <button class="btn btn-sm" wire:click='changeModeSort()'>
                        <i class="fa-solid fa-arrow-{{$mode_sort == "asc" ? "down" : "up"}}-wide-short"></i>
                    </button>
                </th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($languages as $language)
                <tr>
                    <th>{{ $language->label }}</th>
                    <td>{{ $language->description }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" wire:click='editLanguage({{ $language->id }})'>
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" wire:click='deleteLanguage({{ $language->id }})'>
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No languages found</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    @if ($showModalStore)
        <livewire:languages.store />
    @endif

    @if ($showModalUpdate)
        <livewire:languages.edit :id="$language_id" />
    @endif
</div>
