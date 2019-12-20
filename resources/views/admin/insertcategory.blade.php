@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Insert Figure Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('storecategory')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-7 offset-md-2">
                                    <input id="category" type="text"
                                           class="form-control @error('category') is-invalid @enderror" name="category"
                                           value="{{ old('category') }}" required autocomplete="category" autofocus
                                           placeholder="Category Name">

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('INSERT') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
