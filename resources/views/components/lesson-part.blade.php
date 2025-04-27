<div class="container mt-5">
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="text-primary text-center mb-4">Latest {{ $limit }} Part Lessons</h2>

        <a href="{{ route('lessons-parts.index') }}" wire:navigate class="btn btn-primary btn-sm">View All</a>
    </div>

    <div class="row">
        @if ($lesson_parts->isNotEmpty())
            @foreach ($lesson_parts as $lesson_part)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title text-center">{{ $lesson_part->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ \Str::limit($lesson_part->content, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">No part lessons available.</p>
            </div>
        @endif
    </div>
</div>
