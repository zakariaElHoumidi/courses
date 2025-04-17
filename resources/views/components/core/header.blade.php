<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}" wire:navigate>
            <span>Courses</span>
            <sup>4</sup>
            <span>Learn</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if ($links->isNotEmpty())
                    @foreach ($links as $link)
                        @if (!$link['is_dropdown'])
                            <li class="nav-item">
                                <a class="nav-link {{ $link['active'] }}"
                                    href="{{ $link['route'] }}" wire:navigate>{{ $link['name'] }}</a>
                            </li>
                        @else
                            @if (count($link['children']) !== 0)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $link['name'] }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @foreach ($link['children'] as $sublink)
                                            <li>
                                                <a class="dropdown-item {{ $sublink['active'] }}"
                                                    href="{{ $sublink['route'] }}" wire:navigate>{{ $sublink['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
