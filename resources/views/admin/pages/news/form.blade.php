@extends('admin.layouts.app')

@section('title', isset($news) ? 'Edit Berita' : 'Buat Berita')

@section('subheader')
    @include('admin.partials.subheader', [
        'title' => 'Manajemen Berita',
        'breadcrumbs' => [
            ['name' => 'Dashboard', 'url' => route('mindo.home')],
            ['name' => 'Manajemen Berita', 'url' => route('mindo.news.index')],
            [
                'name' => isset($news) ? 'Edit Berita' : 'Tambah Berita Baru',
                'url' => isset($news) ? route('mindo.news.edit', $news) : route('mindo.news.create'),
            ],
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ isset($news) ? route('mindo.news.update', $news) : route('mindo.news.store') }}" method="POST"
                enctype="multipart/form-data" id="news-form"> {{-- ADDED an ID to the form --}}
                @csrf
                @if (isset($news))
                    @method('PUT') {{-- Use PUT for updates --}}
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">{{ isset($news) ? 'Edit Berita' : 'Tambah Berita Baru' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $news->title ?? '') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                {{-- Quill Editor Container --}}
                                <div id="content-editor" style="height: 300px;">
                                    {!! old('content', $news->content ?? '') !!} {{-- Populate with old content or existing content --}}
                                </div>
                                {{-- Hidden Input for Quill Content --}}
                                <input type="hidden" name="content" id="content"
                                    value="{{ old('content', $news->content ?? '') }}">
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="place" class="col-sm-2 col-form-label">Place</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('place') is-invalid @enderror"
                                    id="place" name="place" value="{{ old('place', $news->place ?? '') }}">
                                @error('place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                                <img id="imagePreview" src="{{ $imageSrc }}" alt="Image Preview"
                                    style="max-width: 200px;" class="mb-2">

                                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                    id="photo" name="photo" accept="image/jpeg,image/jpg,image/png">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('mindo.news.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const photoInput = document.getElementById('photo');
        const imagePreview = document.getElementById('imagePreview');
        let originalImageSrc = imagePreview.src; // Store the initial image source

        photoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }

                reader.readAsDataURL(file);
            } else {
                // Reset to the original image if no file is selected
                imagePreview.src = originalImageSrc;
            }
        });

        // --- Quill Initialization ---
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#content-editor', { // Initialize Quill
                theme: 'snow', // Use the 'snow' theme (you can choose others)
                modules: {
                    toolbar: [ // Customize the toolbar
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'direction': 'rtl'
                        }],
                        [{
                            'size': ['small', false, 'large', 'huge']
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'font': []
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image', 'video'], // Enable image and video
                        ['clean']
                    ]
                }
            });

            // Get the hidden input
            const hiddenContentInput = document.getElementById('content');

            // Update hidden input on form submit
            const form = document.getElementById('news-form'); // Get the form element by ID

            form.addEventListener('submit', function(event) {
                // Get Quill's HTML content
                hiddenContentInput.value = quill.root.innerHTML;
                // OR, to get plain text:
                // hiddenContentInput.value = quill.getText();
                // No need preventDefault, let the form submit.
            });


            // For PRE-POPULATING Quill with existing content (in edit mode):
            @if (isset($news))
                // Important:  We're using a standard JavaScript string here,
                // *not* Blade's escaping.  This is because the content is already
                // HTML, and we *want* to render the HTML.  This is safe because
                // we're using a rich text editor, and we've already escaped
                // and purified the content on input.
                quill.root.innerHTML = `{!! $news->content !!}`;
            @endif
        });
    </script>
@endpush

@push('styles')
    {{--  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}} {{-- We are using VITE, not CDN! --}}
    <style>
        /* Add any custom styles for the Quill editor here */
        /* Example:  Adjust the toolbar height */
        .ql-toolbar {
            height: auto;
            /* Or a specific height */
        }
    </style>
@endpush
