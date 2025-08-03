{{-- @extends('backend.app')

@section('title', 'Subscription')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('subscription.index') }}">Subscription</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('subscription.store') }}" method="POST">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="name" class="form-label">Name:</label>
                                            <select class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name">
                                                <option value="" disabled selected>Please Select Plan</option>
                                                <option value="Basic" {{ old('name') == 'Basic' ? 'selected' : '' }}>Basic
                                                </option>
                                                <option value="Standard" {{ old('name') == 'Standard' ? 'selected' : '' }}>
                                                    Standard</option>
                                                <option value="Premium" {{ old('name') == 'Premium' ? 'selected' : '' }}>
                                                    Premium</option>
                                            </select>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div>
                                            <label for="price" class="form-label">Price:</label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                id="price" name="price" placeholder="Please Enter Price"
                                                value="{{ old('price') }}" step="0.01">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label for="deadline" class="form-label">Deadline:</label>
                                            <select class="form-control @error('deadline') is-invalid @enderror"
                                                id="deadline" name="deadline">
                                                <option value="monthly"
                                                    {{ old('deadline') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                                <option value="yearly" {{ old('deadline') == 'yearly' ? 'selected' : '' }}>
                                                    Yearly</option>
                                            </select>
                                            @error('deadline')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <label for="description" class="form-label">Description:</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                placeholder="Type here...">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <label for="features" class="form-label">Features:</label>
                                            <div id="features-wrapper">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="features[]"
                                                        placeholder="Feature">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="add-feature">Add</button>
                                                </div>
                                            </div>
                                            @error('features')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('subscription.index') }}" class="btn btn-danger">Cancel</a>
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

        document.getElementById('add-feature').addEventListener('click', function() {
            var wrapper = document.getElementById('features-wrapper');
            var inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mb-3';
            inputGroup.innerHTML = `
                <input type="text" class="form-control" name="features[]" placeholder="Feature">
                <button class="btn btn-outline-secondary remove-feature" type="button">Remove</button>
            `;
            wrapper.appendChild(inputGroup);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-feature')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endpush --}}
