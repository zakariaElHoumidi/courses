<div class="modal fade show" style="display: block" id="updateLanguage" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateLanguage">Update Language</h1>
                <button type="button" class="btn-close" wire:click="modalToggle"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="label" class="col-form-label">Label</label>

                    <input id="label" type="text"
                        class="form-control shadow-sm @error('label') is-invalid @enderror" name="label"
                        value="{{ old('label') }}" required placeholder="Label" wire:model.lazy="label">

                    @error('label')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="col-form-label">Description</label>

                    <input id="description" type="text"
                        class="form-control shadow-sm @error('description') is-invalid @enderror" name="description"
                        value="{{ old('description') }}" required placeholder="Description"
                        wire:model.lazy="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="modalToggle">Close</button>
                <button type="button" class="btn btn-primary" wire:click="updateLanguage">Edit</button>
            </div>
        </div>
    </div>
</div>
