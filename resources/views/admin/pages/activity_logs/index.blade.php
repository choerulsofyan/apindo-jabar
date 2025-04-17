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
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Activity Logs</h3>
                    <div class="d-flex gap-1">
                        <form action="{{ route('mindo.activity-logs.index') }}" method="GET">
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
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="w-5">No</th>
                            <th class="w-15">
                                <a href="{{ route('mindo.activity-logs.index', ['sort_by' => 'log_name', 'sort_order' => request('sort_by') == 'log_name' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="text-decoration-none link-dark">
                                    Nama Log
                                    @if (request('sort_by') == 'log_name')
                                        <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="w-30">
                                <a href="{{ route('mindo.activity-logs.index', ['sort_by' => 'description', 'sort_order' => request('sort_by') == 'description' && request('sort_order') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="text-decoration-none link-dark">
                                    Deskripsi
                                    @if (request('sort_by') == 'description')
                                        <i class="fa fa-sort-{{ request('sort_order', 'asc') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="text-center w-15">Pemicu</th>
                            {{-- <th>Module</th> --}}
                            {{-- <th>Changes</th> --}}
                            <th class="text-center w-15">
                                <a href="{{ route('mindo.activity-logs.index', ['sort_by' => 'created_at', 'sort_order' => request('sort_by', 'created_at') == 'created_at' && request('sort_order', 'desc') == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}"
                                    class="text-decoration-none link-dark">
                                    Timestamp
                                    @if (request('sort_by', 'created_at') == 'created_at')
                                        <i class="fa fa-sort-{{ request('sort_order', 'desc') == 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="text-center w-10">Aksi</th>
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
