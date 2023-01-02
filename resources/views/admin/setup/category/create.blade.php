@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Category Create</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card card-primary card-outline">
    <form method="POST" action="{{ route('admin.category.store') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label class="col-form-label" for="title">Title</label>
          <input type="text" class="form-control {{-- is-invalid --}}" id="title" name="title" placeholder="Enter here...">
          <span style="color:red">
            @error('title')
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