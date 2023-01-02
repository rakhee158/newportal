 @extends('admin.layouts.app')

@section('content')
@section('heading', 'Post Details')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-capitalize">{{ Request::segment(4) }} {{ Request::segment(5) }}</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
       <h3 class="fw-bold text-primary"> post details</h3>
      <img src="{{ url('public/image/'.$data_lists->image) }}"
              style="height: 200px; width: 250px;">
      <div class="card-body p-5">
        <div class="d-flex justify-content-between align-items-center">
          <p class="btn btn-dark rounded-pill">{{ $data_lists->title  }}</p>
        </div>
        <p>{{  $data_lists->detail  }}</p>
      </div>
  </div>
</section>
@endsection