@extends('admin.layout.master')
@section('content')
<div class="col-md-6 col-md-offset-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Add Category</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" method="POST" action="{{Route('category.store')}}">
          @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Vegestable, Meat, ..." />
          </div>
          @if($errors->has('name'))
            <p style="color:red">{{$errors->first('name')}}</p>
          @endif
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <a href="{{Route('category.index')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection