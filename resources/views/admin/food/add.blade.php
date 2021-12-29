@extends('admin.layout.master')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Add Food</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" method="POST" action="{{Route('food.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Fish, Pig, ..." />
          </div>
          @if($errors->has('name'))
            <p style="color:red">{{$errors->first('name')}}</p>
          @endif
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="VNĐ" />
          </div>
          @if($errors->has('price'))
            <p style="color:red">{{$errors->first('price')}}</p>
          @endif
          <div class="form-group">
            <label>Category Select</label>
            <select name="cate_id" class="js-example-basic-single" style="width: 100%;">
              @foreach($categories as $key => $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Image upload</label>
            <input type="file" name="image_url" class="file-upload-default" />
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" />
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <a href="{{Route('food.index')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
  {{-- <div class="col-md-6 col-md-offset-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Image Preview</h4>
        <p class="card-description"></p>
        <img src="#" id="image_preview" alt="No image" style="width:100px; height: 100px;" />
      </div>
    </div>
  </div> --}}

</div>

@endsection