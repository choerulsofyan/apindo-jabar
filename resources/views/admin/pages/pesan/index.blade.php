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
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Daftar Pesan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center w-5">#</th>
                                <th class="">Tanggal</th>
                                <th class="">Nama</th>
                                <th class="">Email</th>
                                <th class="">Phone</th>
                                <th class="">Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr class="align-middle">
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td id="pesan">
                                        {{ Str::limit($item->pesan, 50) }}
                                        @if (strlen($item->pesan) > 50)
                                            <span id="moreText" style="display:none;">{{ substr($item->pesan, 50) }}</span>
                                            <a href="javascript:void(0);" id="toggleText" class="text-primary">Lihat
                                                lebih</a>
                                        @endif
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
