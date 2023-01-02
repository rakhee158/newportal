@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3 class="text-capitalize">{{ Request::segment(3) }} {{ Request::segment(4) }}</h3>
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
    <form method="POST" action="{{ route('admin.country.store') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label class="col-form-label" for="cname">Name of the country</label>
          <input type="text" class="form-control {{-- is-invalid --}}" id="cname" name="cname" placeholder="Choose country name..." {{ old('cname') }}>
          <span style="color:red">@error('cname') {{ $message }} @enderror </span>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</section>
@endsection