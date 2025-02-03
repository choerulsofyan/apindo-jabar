<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0">{{ $title }}</h3> <!-- Dynamic title -->
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
                @else
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
