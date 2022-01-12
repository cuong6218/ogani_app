@extends('admin.layout.master')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="page-header flex-wrap">
          <h4 class="card-title">Food Table ({{$total}} products)</h4>
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
      
      <nav aria-label="Page navigation example " id="pagination_sample">
        {{$foods->links()}}
        {{-- <ul class="pagination">
          <li class="page-item @if($foods->onFirstPage()) disabled @endif">
            <a class="page-link " href="{{$foods->previousPageUrl()}}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          @foreach($foods->getUrlRange(1,$foods->lastPage()) as $page_number => $page_url)
          <li class="page-item"><a class="page-link" @if($foods->currentPage() == $page_number) style="color:red;" @endif href="{{$page_url}}">{{$page_number}}</a></li>
          @endforeach
          <li class="page-item @if($foods->currentPage() == $foods->lastPage()) disabled @endif">
            <a class="page-link" href="{{$foods->nextPageUrl();}}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul> --}}
      </nav>
    </div>
  </div>
</div>
@endsection