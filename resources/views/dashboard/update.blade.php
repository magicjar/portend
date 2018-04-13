@extends('dashboard.app-boilerplate')

@section('dashboard.sidebar')
    @include('dashboard.app-sidebar')
@endsection

@section('content')
<div class="card mb-4">
    <h1 class="h2 mb-0 font-weight-bold card-body text-center">Script Update</h1>
</div>
<div class="card">
    <div class="card-body">
        <p class="text-info">This might take a seconds to couple of minutes to process, <span class="text-danger">please don't close this tab</span> while the updates is running.</p>
        <p class="text-info">It will automaticaly redirectd to dashboard if the updates is completed.</p>
        <form action="{{ route('dashboard.update.schema') }}" id="update" method="POST" class="text-right">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">Update</button>
        </form>
    </div>
</div>
@endsection