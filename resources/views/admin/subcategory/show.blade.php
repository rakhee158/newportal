@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-capitalize">{{ Request::segment(3) }} {{ Request::segment(5) }}</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card card-primary card-outline">
      <div class="card-body">
        <div class="form-group">
          <label class="col-form-label" for="title">subcategory of the news</label>
          <input type="text" class="form-control {{-- is-invalid --}}" id="category" name="category" value="{{ $data_lists->category }}"   readonly>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="title">category of the news</label>
          <input type="text" class="form-control {{-- is-invalid --}}" id="title" name="title" value="{{ $data_lists['getCategory']->title }}" readonly>
        </div>
      </div>
  </div>
</section>
@endsection