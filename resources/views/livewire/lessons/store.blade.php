<div class="modal fade show" style="display: block" id="storeLesson" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="storeLesson">Store Lesson</h1>
                <button type="button" class="btn-close" wire:click="modalToggle"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="col-form-label">Label</label>

                    <input id="title" type="text"
                        class="form-control shadow-sm @error("title") is-invalid @enderror" name="title"
                        value="{{ old("title") }}" required placeholder="title" wire:model.lazy="title">

                    @error("title")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="col-form-label">Description</label>

                    <input id="content" type="text"
                        class="form-control shadow-sm @error("content") is-invalid @enderror" name="content"
                        value="{{ old("content") }}" required placeholder="content"
                        wire:model.lazy="content">

                    @error("content")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="concept_id" class="col-form-label">Concept</label>

                    <select id="concept_id" type="text"
                        class="form-select shadow-sm @error("concept_id") is-invalid @enderror" name="concept_id"
                        value="{{ old("concept_id") }}" required placeholder="concept_id"
                        wire:model.lazy="concept_id">
                        <option selected>Choose Concept</option>
                        @foreach ($concepts as $concept)
                            <option value="{{ $concept->id }}">{{ $concept->label }}</option>
                        @endforeach
                    </select>

                    @error("concept_id")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="modalToggle">Close</button>
                <button type="button" class="btn btn-primary" wire:click="storeLesson">Store</button>
            </div>
        </div>
    </div>
</div>
