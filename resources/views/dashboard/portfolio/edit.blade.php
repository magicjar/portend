@extends('layouts.dashboard-app')

@section('dashboard.sidebar')
	@include('layouts.dashboard-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Edit Portfolio</h1>
</div>

<form id="portfolio" data-id="{{ $portfolio->id }}" method="POST" action="{{ route('dashboard.portfolio.update', $portfolio->id) }}">
    @csrf
    {{ method_field('PATCH') }}
    <div class="actions-wrapper row no-gutters">
        <div class="actions-body mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" placeholder="Enter title here" value="{{ old('title', $portfolio->title) }}" required>
                        @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" placeholder="Enter description here" rows="10" required>{{ old('description', $portfolio->description) }}</textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" placeholder="Enter portfolio url" value="{{ old('url', $portfolio->url) }}">
                        @if ($errors->has('url'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}" type="text" name="client" id="client" placeholder="Enter client name" value="{{ old('client', $portfolio->client) }}">
                        @if ($errors->has('client'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('client') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div>
                        <input class="form-control {{ $errors->has('client_url') ? 'is-invalid' : '' }}" type="text" name="client_url" id="client_url" placeholder="Enter client url name" value="{{ old('client_url', $portfolio->client_url) }}">
                        @if ($errors->has('client_url'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('client_url') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <portfoliomedia-component></portfoliomedia-component>

        <portfoliocreate-component></portfoliocreate-component>

        <mediamodal-component></mediamodal-component>

    </div>
</form>
@endsection