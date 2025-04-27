<div class="modal fade show" style="display: block" id="updateConcept" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateConceptLabel">Update Concept</h1>
                <button type="button" class="btn-close" wire:click="modalToggle"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="label" class="col-form-label">Label</label>

                    <input id="label" type="text" class="form-control shadow-sm @error('label') is-invalid @enderror"
                        name="label" value="{{ old('label') }}" required placeholder="Label" wire:model.lazy="label">

                    @error('label')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="col-form-label">Description</label>

                    <input id="description" type="text" class="form-control shadow-sm @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}" required placeholder="description"
                        wire:model.lazy="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="col-form-label">Category</label>

                    <select id="category_id" type="text" class="form-select shadow-sm @error('category_id') is-invalid @enderror"
                        name="category_id" value="{{ old('category_id') }}" required placeholder="category_id"
                        wire:model.lazy="category_id">
                        <option selected>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="language_id" class="col-form-label">Language</label>

                    <select id="language_id" type="text" class="form-select shadow-sm @error('language_id') is-invalid @enderror"
                        name="language_id" value="{{ old('language_id') }}" required placeholder="language_id"
                        wire:model.lazy="language_id">
                        <option selected>Choose Language</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->label }}</option>
                        @endforeach
                    </select>

                    @error('language_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="modalToggle">Close</button>
                <button type="button" class="btn btn-primary" wire:click="updateConcept">Edit</button>
            </div>
        </div>
    </div>
</div>
