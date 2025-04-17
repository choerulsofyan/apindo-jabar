@extends('admin.layouts.app')

@section('title', 'Pesan')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Pesan',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Pesan', 'url' => route('mindo.pesan.index')],
            ['name' => 'Daftar Pesan', 'url' => route('mindo.pesan.index')],
        ],
    ])
@endsection

@section('content')
    @if ($message = Session::get('message'))
        <div class="alert alert-{{ Session::get('alert-type', 'success') }} alert-dismissible fade show" role="alert">
            <i class="fa fa-check"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!--begin::Row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Pesan</h3>
                        <div class="d-flex gap-1">
                            <form action="{{ route('mindo.pesan.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        placeholder="Search..." value="{{ request('search') }}">
                                    <button class="btn btn-sm btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="w-15">
                                    <a href="{{ route('mindo.pesan.index', ['sort_by' => 'tanggal', 'sort_order' => request('sort_by') == 'tanggal' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Tanggal
                                        @if (request('sort_by', 'tanggal') == 'tanggal')
                                            <i class="fa fa-sort-{{ request('sort_order', 'desc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-25">
                                    <a href="{{ route('mindo.pesan.index', ['sort_by' => 'name', 'sort_order' => request('sort_by') == 'name' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Nama Pengirim
                                        @if (request('sort_by') == 'name')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="w-25">
                                    <a href="{{ route('mindo.pesan.index', ['sort_by' => 'email', 'sort_order' => request('sort_by') == 'email' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                        class="text-decoration-none link-dark">
                                        Email
                                        @if (request('sort_by') == 'email')
                                            <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                {{-- <th class="">Pesan</th> --}}
                                <th class="w-10 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td id="pesan">
                                        {{ Str::limit($item->pesan, 50) }}
                                        @if (strlen($item->pesan) > 50)
                                            <span id="moreText" style="display:none;">{{ substr($item->pesan, 50) }}</span>
                                            <a href="javascript:void(0);" id="toggleText" class="text-primary">Lihat
                                                lebih</a>
                                        @endif
                                    </td> --}}
                                    <td>
                                        @can('PESAN_LIST')
                                            <a class="btn btn-info" href="{{ route('mindo.pesan.show', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->


                <div class="card-footer clearfix">
                    <div class="text-muted float-start">
                        Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
                    </div>
                    @if ($data->hasPages())
                        <ul class="pagination pagination-sm m-0 float-end">
                            @if ($data->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $data->appends(request()->query())->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $url . (strpos($url, '?') === false ? '?' : '&') . http_build_query(request()->except('page')) }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            @if ($data->hasMorePages())
                                <li class="page-item"><a class="page-link" 
                                        href="{{ $data->appends(request()->query())->nextPageUrl() }}">&raquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    @endif
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.col -->
    </div>
    <!--end::Row-->

    <!-- Delete Confirmation Modal -->
    @include('admin.components.delete-confirmation-modal')
@endsection

@push('scripts')
    <script>
        document.getElementById('toggleText').addEventListener('click', function() {
            // Menampilkan teks yang tersembunyi
            var moreText = document.getElementById('moreText');
            var toggleText = document.getElementById('toggleText');

            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                toggleText.textContent = "Lihat lebih sedikit"; // Mengubah teks tautan
            } else {
                moreText.style.display = "none";
                toggleText.textContent = "Lihat lebih"; // Mengubah teks tautan kembali
            }
        });
    </script>
@endpush
