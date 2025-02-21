@extends('public.layouts.app')

@section('title', 'Regulasi - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('Regulasi APINDO Jawa Barat'), 155))

@section('content')
    <section class="regulations-page py-5">
        <div class="container">
            <h1 class="text-center mb-4 fw-bolder">Regulasi</h1>

            <div class="row mb-3 pt-3">
                <div class="col-md-6">
                    <form action="{{ route('regulations') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by title..." name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($regulations->isEmpty())
                <div class="alert alert-info text-center">
                    Tidak ada regulasi.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    <a href="{{ route('regulations', ['sort_by' => 'title', 'sort_order' => request('sort_by') == 'title' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Title
                                        @if (request('sort_by') == 'title')
                                            <i
                                                class="bi bi-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('regulations', ['sort_by' => 'date', 'sort_order' => request('sort_by') == 'date' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Date
                                        @if (request('sort_by') == 'date')
                                            <i
                                                class="bi bi-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regulations as $index => $regulation)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $regulation->title }}</td>
                                    {{-- <td>{{ $regulation->date->format('F j, Y') }}</td> --}}
                                    <td></td>
                                    <td>
                                        @if ($regulation->file)
                                            <a href="{{ Storage::url('public/regulations/' . $regulation->file) }}"
                                                target="_blank" class="btn btn-outline-primary">
                                                <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                Download
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links --}}
                <div class="d-flex justify-content-center">
                    {{ $regulations->appends(['search' => request('search'), 'sort_by' => request('sort_by'), 'sort_order' => request('sort_order')])->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
