@extends('layouts.app') 
@section('content')
@include('layouts.authnav')

<section class="create">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Advert create</h2>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                @if($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="file">Upload poster</label>
                <input type="file" class="form-control" id="file" placeholder="File" name="poster">
                @if($errors->has('poster'))
                    <span class="help-block">
                        <strong>{{ $errors->first('poster') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                @if($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" placeholder="Author" name="author">
                @if($errors->has('author'))
                    <span class="help-block">
                        <strong>{{ $errors->first('author') }}</strong>
                    </span>
                @endif
              </div>
              <button type="submit" class="btn btn-primary">Create</button>

              {{ csrf_field() }}

            </form>
        </div>
        <div class="col-md-7"></div>
    </div>
</section>
@include('layouts.footer')
@endsection