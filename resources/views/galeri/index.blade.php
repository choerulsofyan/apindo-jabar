@extends('layouts.admin')

@section('title', 'Galeri')

@section('subheader')
    @include('partials.admin.subheader', [
        'title' => 'Galeri',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Manajemen Galeri', 'url' => route('galeri.index')],
            ['name' => 'Daftar Galeri', 'url' => route('galeri.index')],
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
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Daftar Galeri</h3>
                    <a href="{{ route('galeri.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Tambah
                        Baru</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="">Tanggal</th>
                                <th class="">Deskripsi</th>
                                <th class="">Photo</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}</td>
                                    <td id="deskripsi">
                                        {{ Str::limit($item->deskripsi, 50) }}
                                        @if (strlen($item->deskripsi) > 50)
                                            <span id="moreText" style="display:none;">{{ substr($item->deskripsi, 50) }}</span>
                                            <a href="javascript:void(0);" id="toggleText" class="text-primary">Lihat lebih</a>
                                        @endif
                                    </td>                                                                     
                                    <td>
                                        <a href="{{ URL::asset('storage/galeri/'.$item->file) }}" class="image-link" target="_blank">
                                            <img src="{{ URL::asset('storage/galeri/'.$item->file) }}" style="width:100px; height:100px;" alt="{{ $item->file }}">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-warning" href="{{ route('galeri.edit', $item->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmationModal" data-item-id="{{ $item->id }}"
                                            data-delete-route="{{ route('galeri.destroy', $item->id) }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
                                        href="{{ $data->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($data->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">&raquo;</a>
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
    @include('components.delete-confirmation-modal')
@endsection

@push('scripts')
<script>
    document.getElementById('toggleText').addEventListener('click', function() {
        // Menampilkan teks yang tersembunyi
        var moreText = document.getElementById('moreText');
        var toggleText = document.getElementById('toggleText');
        
        if (moreText.style.display === "none") {
            moreText.style.display = "inline";
            toggleText.textContent = "Lihat lebih sedikit";  // Mengubah teks tautan
        } else {
            moreText.style.display = "none";
            toggleText.textContent = "Lihat lebih";  // Mengubah teks tautan kembali
        }
    });
</script>
@endpush

