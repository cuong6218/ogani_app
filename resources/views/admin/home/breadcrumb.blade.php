@if(Session::get("error"))
<div class="alert alert-danger" id="alert-message">
  <span class="alert-message">{{Session::get("error")}}</span>
  <span class="closebtn pull-right" onclick="this.parentElement.style.display='none';">&times;</span>  
  
</div>
@elseif(Session::get("success"))
<div class="alert alert-success" id="alert-message">
  <span class="alert-message">{{Session::get("success")}}</span>
    <span class="closebtn pull-right" onclick="this.parentElement.style.display='none';">&times;</span>
  </div>
@endif
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