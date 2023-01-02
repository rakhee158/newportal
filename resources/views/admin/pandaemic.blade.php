@extends('admin.main')
 @section('content')

 <div class="container mb-3">
 <form action="{{route('store1.store')}}" method="POST">
  @method('post')
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Headline of the news</label>
      <input type="text" name="heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
       
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Detail</label>
      <input type="text" name="detail" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="sumbit" class="btn btn-primary">save post</button>
  </form>
</div>
<table class="table container mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Heading</th>
      <th scope="col">Detail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datas as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->heading}}</td>
      <td>{{$item->detail}}</td>
      <td>
          <a href="{{ route('store1.edit',$item->id) }}" class="btn btn-warning">edit</a>
          <a href="{{ route('store1.destroy',$item->id) }}" class="btn btn-danger">delete</button>
      </td>
    </tr>
    @endforeach
      </tbody>
</table>

 @endsection

