@extends('admin.layouts.app')

@section('title', 'Activity Log Detail')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Activity Log Detail</h3>
            </div>
            <div class="card-body">
                <p><strong>Log Name:</strong> {{ $activity->log_name }}</p>
                <p><strong>Description:</strong> {{ $activity->description }}</p>
                <p><strong>Causer:</strong>
                    @if ($activity->causer)
                        {{ $activity->causer->name }}
                    @else
                        System
                    @endif
                </p>
                <p><strong>Email:</strong>
                    @if ($activity->causer)
                        {{ $activity->causer->email }}
                    @else
                        -
                    @endif
                </p>
                {{-- <p><strong>Subject:</strong>
                    @if ($activity->subject)
                        {{ class_basename($activity->subject_type) }} (ID: {{ $activity->subject_id }})
                    @else
                        -
                    @endif
                </p> --}}
                <p><strong>Timestamp:</strong> {{ $activity->created_at->toDateTimeString() }}
                    ({{ $activity->created_at->diffForHumans() }})</p>

                @if ($activity->log_name === 'authentication' && $activity->properties && $activity->properties->count() > 0)
                    <h4>Properties:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->properties as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>
                                        @if (is_array($value))
                                            {{ json_encode($value) }}
                                        @else
                                            {{ $value }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                @if ($activity->changes && $activity->changes->has('attributes'))
                    <h4>Changes:</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Attribute</th>
                                <th>Old Value</th>
                                <th>New Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity->changes['attributes'] as $attribute => $newValue)
                                <tr>
                                    <td>{{ $attribute }}</td>
                                    <td>
                                        @if (isset($activity->changes['old'][$attribute]))
                                            @if (is_array($activity->changes['old'][$attribute]))
                                                {{ json_encode($activity->changes['old'][$attribute]) }}
                                            @else
                                                {{ $activity->changes['old'][$attribute] }}
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if (is_array($newValue))
                                            {{ json_encode($newValue) }}
                                        @else
                                            {{ $newValue }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('mindo.activity-logs.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
