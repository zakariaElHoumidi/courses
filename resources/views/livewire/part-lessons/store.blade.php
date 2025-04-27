<div class="modal fade show" style="display: block" id="storePartLesson" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="storePartLesson">Store Part Lesson</h1>
                <button type="button" class="btn-close" wire:click="modalToggle"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="order" class="col-form-label">Label</label>

                    <input id="order" type="text"
                        class="form-control shadow-sm @error("title") is-invalid @enderror" name="title"
                        value="{{ old("title") }}" required placeholder="title" wire:model.lazy="title">

                    @error("title")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="col-form-label">Content</label>

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
                    <label for="lesson_id" class="col-form-label">Lesson</label>

                    <select id="lesson_id" type="text"
                        class="form-select shadow-sm @error("lesson_id") is-invalid @enderror" name="lesson_id"
                        value="{{ old("lesson_id") }}" required placeholder="lesson_id"
                        wire:model.lazy="lesson_id">
                        <option selected>Choose Lesson</option>
                        @foreach ($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                        @endforeach
                    </select>

                    @error("lesson_id")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order" class="col-form-label">Order</label>

                    <input id="order" type="text"
                        class="form-control shadow-sm @error("order") is-invalid @enderror" name="order"
                        value="{{ old("order") }}" required placeholder="order" wire:model.lazy="order">

                    @error("order")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="modalToggle">Close</button>
                <button type="button" class="btn btn-primary" wire:click="storePartLesson">Store</button>
            </div>
        </div>
    </div>
</div>
