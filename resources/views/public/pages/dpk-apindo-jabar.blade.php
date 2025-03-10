@extends('public.layouts.app')

@section('title', 'DPK - APINDO Jawa Barat')
@section('meta_description', Str::limit(strip_tags('DPK APINDO Jawa Barat'), 155))

@section('content')
    <section class="dpk-apindo-jabar-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @include('public.partials.sidebar')
                </div>
                <div class="col-lg-8">
                    @foreach ($dpkData as $index => $dpk)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    {{ $index + 1 }}. {{ $dpk['city'] }}
                                </h5>
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4">Ketua</dt>
                                    <dd class="col-sm-8">{{ $dpk['chairman'] }}</dd>

                                    <dt class="col-sm-4">Sekretaris</dt>
                                    <dd class="col-sm-8">{{ $dpk['secretary'] }}</dd>

                                    @if (!empty($dpk['executive_secretary']))
                                        <dt class="col-sm-4">Sekretaris Eksekutif</dt>
                                        <dd class="col-sm-8">{{ $dpk['executive_secretary'] }}</dd>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
