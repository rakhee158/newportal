 @extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="{{ route('admin.country.create') }}" class="btn btn-sm btn-primary">Add +</a>
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
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped table-hover my-0">
          <thead class="thead-dark">
            <tr class="text-center">
              <th width="5%">SN</th>
              <th>Name of the country</th>
              <th>Created info</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data_lists as $key => $element)
            <tr class="text-center">
              <td>{{ $key+1 }}</td>
              <td class="text-left">{{ $element->cname }}</td>
              <td>
                {{ $element['getUserOne']->name }} <br>
                {{ $element->created_at->format('Y-m-d') }}
              </td>
              <td >
                <a href="{{route('admin.country.show',$element->id)}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                <a href="{{route('admin.country.edit',$element->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                <form class="d-inline-block" method="post" action="{{route('admin.country.destroy',$element->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-xs" ><i class="fa fa-trash"></i></button>
                        </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      Footer
    </div>
  </div>

</section>
@endsection