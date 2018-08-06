@extends('layouts.app') 

@section('content') 
@include('layouts.navigation')
<!-- Page Content -->
<br>
<div class="container">
   <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <div class="card mb-3">
              <img class="card-img-top" src="uploads/poster/{{ $adverts->poster }}" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">{{ $adverts->title }}</h5>
                  <p class="card-text">{{ $adverts->description }}</p>
                  <p class="card-text">
                      <small class="text-muted">{{ $adverts->author }}</small>
                      <small class="text-muted">added: {{ $adverts->created_at }}</small>
                  </p>
              </div>
          </div>
       </div>
       <div class="col-md-3"></div>
    </div>
</div>

<!-- /.container -->
@include('layouts.footer')

@endsection