@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
    @include('dashboard.app-sidebar')
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
                    <div class="tools text-right">
                        <button type="button" class="btn btn-secondary mb-0 bottom-rounded-0 border-bottom-0" data-toggle="modal" data-target="#imagemodal"><i data-feather="image"></i> Add Media</button>
                    </div>
                    <div style="border: 1px solid #c5c5c5">
                        <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content" placeholder="Enter content here" rows="15">{{ old('content') }}</textarea>
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

        <mediamodal-component></mediamodal-component>

    </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#content',
        menubar: false,
        content_css : '/css/dashboard.css',
        height : 600,
        plugins: [
            'advlist autolink link image lists',
            'wordcount code fullscreen media',
            'table'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold underline italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | link image media | code fullscreen',
    });
</script>
@endsection