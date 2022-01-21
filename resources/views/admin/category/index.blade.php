@extends('admin.layout.master')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="page-header flex-wrap">
          <h4 class="card-title">Category Table</h4>
          
          <div class="d-flex">
            <a href="{{Route('category.add')}}" class="btn btn-sm ml-3 btn-success"> Add </a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($categories as $key => $category)
              <tr>
                <td class="py-1">{{$key+1}}</td>
                <td>{{$category->name}}</td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                      <a class="dropdown-item" href="{{Route('category.edit', $category->id)}}">Update</a>
                      <a class="dropdown-item" href="{{Route('category.delete', $category->id)}}">Delete</a>
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
      <nav aria-label="Page navigation example " id="pagination_sample">
        {{$categories->onEachSide(3)->links()}}
      </nav>
    </div>
  </div>

</div>
@endsection