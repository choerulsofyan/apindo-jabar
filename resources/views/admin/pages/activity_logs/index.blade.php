@extends('admin.layouts.app')

@section('title', 'Activity Logs')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Activity Logs',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Activity Logs', 'url' => route('mindo.activity-logs.index')],
        ],
    ])
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Log</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Pemicu</th>
                            {{-- <th>Module</th> --}}
                            {{-- <th>Changes</th> --}}
                            <th class="text-center">Timestamp</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $activity->log_name }}</td>
                                <td>{{ $activity->description }}</td>
                                <td class="text-center">
                                    @if ($activity->causer)
                                        {{ $activity->causer->name }}
                                    @else
                                        System
                                    @endif
                                </td>
                                {{-- <td>
                                    @if ($activity->subject_type)
                                        {{ class_basename($activity->subject_type) }}
                                        @if ($activity->subject_id)
                                            ({{ $activity->subject_id }})
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td> --}}
                                {{-- <td>
                                    @php
                                        $changes = '';
                                        if ($activity->changes && $activity->changes->has('attributes')) {
                                            $changes = collect($activity->changes['attributes'])
                                                ->keys()
                                                ->implode(', ');
                                        }
                                    @endphp
                                    {{ $changes }}
                                </td> --}}
                                <td title="{{ $activity->created_at }}" class="text-center">
                                    {{ $activity->created_at->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('mindo.activity-logs.show', $activity->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="text-muted float-start">
                    Showing {{ $activities->firstItem() }} to {{ $activities->lastItem() }} of
                    {{ $activities->total() }} results
                </div>
                @if ($activities->hasPages())
                    <ul class="pagination pagination-sm m-0 float-end">
                        @if ($activities->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $activities->appends(request()->query())->previousPageUrl() }}">&laquo;</a>
                            </li>
                        @endif

                        @foreach ($activities->getUrlRange(1, $activities->lastPage()) as $page => $url)
                            <li class="page-item {{ $activities->currentPage() == $page ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ $url . (strpos($url, '?') === false ? '?' : '&') . http_build_query(request()->except('page')) }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach

                        @if ($activities->hasMorePages())
                            <li class="page-item">
                                <a class="page-link"
                                    href="{{ $activities->appends(request()->query())->nextPageUrl() }}">&raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
