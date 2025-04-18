<div class="modal fade show" style="display: block" id="storeCategory" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="storeCategoryLabel">Update Category</h1>
                <button type="button" class="btn-close" wire:click="modalToggle"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="label" class="col-form-label">Label</label>

                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror"
                        name="label" value="{{ old('label') }}" required placeholder="Label" wire:model.lazy="label">

                    @error('label')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="modalToggle">Close</button>
                <button type="button" class="btn btn-primary" wire:click="updateCategory">Edit</button>
            </div>
        </div>
    </div>
</div>
