@extends('backend.app')

@section('title', 'Work Process')

@push('styles')
    <style>
        .dropify-wrapper {
            height: 285px;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            {{-- start page title --}}
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('work-process.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Work Process</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end page title --}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('work-process.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row gy-4">
                                    {{-- Title --}}
                                    <div class="col-md-12">
                                        <div>
                                            <label for="title" class="form-label">Title:</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" id="title" placeholder="Please Enter Title"
                                                value="{{ old('title', $workProcess->title ?? '') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-md-6">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            placeholder="About System...">{{ old('description', $workProcess->description ?? '') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Image --}}
                                    <div class="col-md-6">
                                        <div>
                                            <label for="image" class="form-label">Image:</label>
                                            <input type="hidden" name="remove_image" value="0">
                                            <input class="form-control dropify @error('image') is-invalid @enderror"
                                                type="file" name="image" id="image"
                                                data-default-file="@isset($workProcess){{ asset($workProcess->image) }}@endisset">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Sub Title & Sub Description --}}
                                    <div class="col-12">
                                        <label class="form-label">
                                            <h3>Sub Titles & Descriptions:</h3>
                                        </label>
                                        <div id="work-process-wrapper">
                                            @foreach ($subTitles as $index => $subTitle)
                                                <div class="work-process-item mb-4">
                                                    {{-- Fixed Sub Title Heading --}}
                                                    <h5>{{ ucfirst(str_replace('_', ' ', $subTitle)) }}</h5>
                                                    {{-- Sub Description Textarea --}}
                                                    <textarea class="form-control @error("sub_description.$subTitle") is-invalid @enderror"
                                                        id="sub_description_{{ $index }}" name="sub_description[{{ $subTitle }}]"
                                                        placeholder="Enter Description for {{ ucfirst(str_replace('_', ' ', $subTitle)) }}">{{ old("sub_description.$subTitle", $subDescriptions[$subTitle] ?? '') }}</textarea>
                                                    @error("sub_description.$subTitle")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    {{-- Submit Button --}}
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        $(document).ready(function() {
            $('.dropify').dropify();

            $('#image').on('dropify.afterClear', function(event, element) {
                $('input[name="remove_image"]').val('1');
            });
        });
    </script>
@endpush
