@extends('admin.layout.master')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="page-header flex-wrap">
          <h4 class="card-title">Food Table</h4>
          <div class="d-flex">
            <a href="{{Route('food.add')}}" class="btn btn-sm ml-3 btn-success"> Add </a>
            <a href="{{Route('food.export')}}" class="btn btn-sm ml-3 btn-info"> Export </a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($foods as $key => $food)
              <tr>
                <td class="py-1">{{$key+1}}</td>
                <td>{{$food->name}}</td>
                <td>{{$food->price}}</td>
                @if($food->category)
                <td>{{$food->category->name}}</td>
                @else
                <td>No category</td>
                @endif
                
                <td>
                  <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                      <a class="dropdown-item" href="{{Route('food.edit', $food->id)}}">Update</a>
                      <a class="dropdown-item" href="{{Route('food.delete', $food->id)}}">Delete</a>
                    </div>
                  </div>
                </td>
                @empty
                  <td>No data</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
 
</div>
@endsection