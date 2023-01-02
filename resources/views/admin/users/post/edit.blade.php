@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-capitalize">{{ Request::segment(4) }} {{ Request::segment(7) }}</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="row my-3">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-primary">
        <h3 class="text-light fw-bold">Edit Post</h3>
      </div>
      <div class="card-body p-4">
        <form method="POST" action="{{ route('User.post.update', [$data_lists->id]) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="my-2">
            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{  $data_lists->title}}" required {{ old('title') }}>
            <span>@error('title') {{ $message }}@enderror</span>
          </div>

          <div class="my-2">
            <input type="text" name="detail" id="detail" class="form-control" placeholder="detail" value="{{ $data_lists->detail }}" required {{ old('detail') }}>
            <span>@error('detail') {{ $message }}@enderror</span>          </div>

          <div class="my-2">
            <input type="file" name="image" id="image" accept="image/*" class="form-control" {{ old('image') }}>
            <span>@error('image') {{ $message }}@enderror</span>

          </div>

          <img src="{{ url('public/image/'.$data_lists->image) }}" class="img-fluid img-thumbnail" width="150">

          

          <div class="my-2">
            <input type="submit" value="Update Post" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
 