@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header bg-primary text-white">
                Create Product
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/create-product') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text"
                               name="category"
                               class="form-control"
                               value="{{ old('category') }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price (Minimum 1000)</label>
                        <input type="number"
                               name="price"
                               class="form-control"
                               value="{{ old('price') }}"
                               min="1000"
                               required>
                        <small class="text-muted">Products with price greater than 1000 will be displayed</small>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Save Product
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
