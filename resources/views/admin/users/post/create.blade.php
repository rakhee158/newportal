@extends('admin.layouts.app')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>create a post of the News</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
           
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card card-primary card-outline">
    <form method="POST" action="{{ route('User.post.store') }}" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <select class="form-select" aria-label="Default select example">
              <option selected> choose category</option>
               @foreach($data_lists as $item)
               <option  >  {{ $item->title }}</option>

               @endforeach
            </select>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="title">Title of the post</label>
          <input type="text" class="form-control {{-- is-invalid --}}" id="title" name="title" placeholder="Enter here..."value="{{ old('title') }}">
          <span style="color:red">
            @error('title')
            {{ $message }}
            @enderror
          </span>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="detail">Details of the news</label>
          <input type="text" class="form-control {{-- is-invalid --}}" id="detail" name="detail" placeholder="Enter here..." value="{{ old('detail') }}">
          <span style="color:red">
            @error('detail')
            {{ $message }}
            @enderror
          </span>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="image">ADD image of the News</label>
          <input type="file" class="form-control {{-- is-invalid --}}" id="image" name="image" placeholder="attach file" value="{{ old('image') }}">
          <span style="color:red">
            @error('image')
            {{ $message }}
            @enderror
          </span>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</section>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection