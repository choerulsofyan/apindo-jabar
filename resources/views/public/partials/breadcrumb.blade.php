<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">News</a></li>
        @if (isset($title))
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        @endif
    </ol>
</nav>
