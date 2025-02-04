@extends('public.layouts.app')

@section('title', 'Visi & Misi Apindo')

@section('content')
    <section class="vision-mission-page py-5">
        <div class="container pt-3">
            <div class="row">
                <div class="col-lg-4">
                    @include('public.partials.sidebar')
                </div>
                <div class="col-lg-8">
                    {{-- Visi --}}
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title text-primary">Visi</h2>
                            <p class="card-text">
                                Terciptanya Iklim Usaha yang Kondusif, Kompetitif, dan Berkelanjutan.
                            </p>
                        </div>
                    </div>

                    {{-- Misi --}}
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-primary">Misi</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Dari JABAR untuk JABAR
                                </li>
                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Dari JABAR untuk INDONESIA
                                </li>
                                <li class="list-group-item">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Dari JABAR untuk DUNIA
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
