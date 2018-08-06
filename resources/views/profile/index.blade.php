@extends('layouts.app')
@section('content') 
@include('layouts.authnav')
<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <a href="{{ url('/profile/create') }}">
        <h1 class="my-4">Create advert</h1>
    </a>
    <div class="row">
        @foreach($advert as $a)
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card">
                <img class="card-img-top" src="uploads/poster/{{ $a->poster }}" alt="poster">
                <div class="card-body">
                    <h4 class="card-title">{{ $a->title }}             </h4>
                    <p class="card-text">
                        <small class="text-muted">Added: {{ $a->created_at }}</small>
                    </p>
                    <p class="card-text">{{ $a->description }}</p>
                    <div class="card-footer setbtn">
                        <p class="author">Author: {{ $a->author }}</p>
                        <form method="post" action="{{ route('profile.destroy', $a->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <a class="btn btn-info" href="{{ route('profile.edit', $a->id) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $advert->links() }}
</div>
<!-- /.container -->
@include('layouts.footer') @endsection