@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Feedback') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storefeedback') }}" >
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-7 offset-md-2">
                                    <textarea placeholder="feedback"
                                              class="form-control @error('feedback') is-invalid @enderror" name="feedback"
                                              required></textarea>
                                    @error('feedback')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Insert New Feedback') }}
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
