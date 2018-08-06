@extends('layouts.app')

@section('content')
@include('layouts.navigation')
<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <h1 class="my-4">Best ads special for you</h1>
    <div class="row">
        @foreach($adverts as $a)
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <img class="card-img-top" src="uploads/poster/{{ $a->poster }}" alt="poster">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('show', $a->id) }}">{{ $a->title }}</a>
                    </h4>
                    <p class="card-text">
                        <small class="text-muted">Added: {{ $a->created_at }}</small>
                    </p>
                    <p class="card-text">{{ $a->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.row -->
    {{ $adverts->links() }}
</div>
<!-- /.container -->
@include('layouts.footer')

@endsection