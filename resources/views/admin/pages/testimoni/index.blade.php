@extends('admin.layouts.app')

@section('title', 'Testimoni')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Testimoni',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Testimoni', 'url' => route('mindo.testimoni.index')],
            ['name' => 'Daftar Testimoni', 'url' => route('mindo.testimoni.index')],
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
                    <h3 class="card-title">List Testimoni</h3>
                    <a href="{{ route('mindo.testimoni.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Tambah
                        Baru</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="">Nama</th>
                                <th class="">Jenis Pekerjaan</th>
                                <th class="">Deskripsi</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_pekerjaan }}</td>
                                    <td style="max-width: 300px; overflow: hidden; word-wrap: break-word;">
                                        {{ Str::limit($item->deskripsi, 50) }}
                                        @if (strlen($item->deskripsi) > 50)
                                            <span class="moreText" style="display: none;">{{ substr($item->deskripsi, 50) }}</span>
                                            <a href="javascript:void(0);" class="toggleText text-primary">Lihat lebih banyak</a>
                                        @endif
                                    </td>
                                    <td>
                                        @can('TESTIMONI_LIST')
                                            <a class="btn btn-info" href="{{ route('mindo.testimoni.show', $item->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('TESTIMONI_EDIT')
                                            <a class="btn btn-warning" href="{{ route('mindo.testimoni.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('TESTIMONI_DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmationModal" data-item-id="{{ $item->id }}"
                                                data-item-name="{{ "Testimoni " . $item->nama }}"
                                                data-delete-route="{{ route('mindo.testimoni.destroy', $item->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
    @include('admin.components.delete-confirmation-modal')
@endsection

@push('scripts')
    <script>
       document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".toggleText").forEach(function (toggle) {
                toggle.addEventListener("click", function () {
                    var moreText = this.previousElementSibling;
                    if (moreText.style.display === "none" || moreText.style.display === "") {
                        moreText.style.display = "inline";
                        this.textContent = "Lihat lebih sedikit";
                    } else {
                        moreText.style.display = "none";
                        this.textContent = "Lihat lebih banyak";
                    }
                });
            });
        });

    </script>
@endpush
