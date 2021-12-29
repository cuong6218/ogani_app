<div class="page-header flex-wrap">
    <h3 class="mb-0"> Breeze <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard template.</span>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Basic tables </li>
        </ol>
    </nav>
</div>

@if(Session::has('success'))
<div class="alert alert-success alert-dismissable">
  <button class="btn btn-icon close-alert" data-dismiss="alert"><i class="mdi mdi-close"></i></button>
  <p class="alert-message text-light">{{Session::get('success')}}</p>
</div>
@elseif(Session::has('error'))
<div class="alert alert-danger alert-dismissable">
  <button class="btn btn-icon close-alert" data-dismiss="alert"><i class="mdi mdi-close"></i></button>
  <p class="alert-message text-light">{{Session::get('error')}}</p>
</div>
@endif