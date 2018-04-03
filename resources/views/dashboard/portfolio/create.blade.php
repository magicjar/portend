@extends('layouts.dashboard-app')

@section('dashboard.sidebar')
	@include('layouts.dashboard-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Add Portfolio</h1>
</div>

<form id="portfolio" method="POST" action="{{ route('dashboard.portfolio.store') }}">
    @csrf
    <div class="actions-wrapper row no-gutters">
        <div class="actions-body mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" placeholder="Enter title here" value="{{ old('title') }}" required>
                        @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group" style="border: 1px solid #c5c5c5">
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" placeholder="Enter description here" rows="10" required>{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" placeholder="Enter portfolio url" value="{{ old('url') }}">
                        @if ($errors->has('url'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" type="text" name="client" id="client" placeholder="Enter client name" value="{{ old('client') }}">
                        @if ($errors->has('client'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('client') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div>
                        <input class="form-control {{ $errors->has('client_url') ? 'is-invalid' : '' }}" type="text" name="client_url" id="client_url" placeholder="Enter client url name" value="{{ old('client_url') }}">
                        @if ($errors->has('client_url'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('client_url') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <portfoliomedia-component></portfoliomedia-component>
            
            <mediamodal-component></mediamodal-component>

        </div>

        <portfoliocreate-component></portfoliocreate-component>

    </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#description',
        menubar: false,
        content_css : '/css/dashboard.css',
        height : 400,
        plugins: [
            'advlist autolink link',
            'wordcount fullscreen',
        ],
        toolbar: 'undo redo | styleselect | bold underline italic | alignleft aligncenter alignright alignjustify | link | fullscreen',
    });
</script>
@endsection