@extends('layouts.dashboard-app')

@section('dashboard.sidebar')
	@include('layouts.dashboard-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Add Article</h1>
</div>

<form id="article" method="POST" action="{{ route('dashboard.article.store') }}">
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
                    <div>
                        <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" placeholder="Enter content here" rows="15" required>{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <articlecreate-component></articlecreate-component>
    </div>
</form>
@endsection