@extends('admin.layout.master')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="page-header flex-wrap">
          <h4 class="card-title">Order Table</h4>
          <div class="d-flex">

          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Order ID</th>
                <th>Total price</th>
                <th>User Info</th>
                <th>Notes</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($orders as $key => $order)
              <tr>
                <td class="py-1">{{$key+1}}</td>
                <td>{{$order->order_id}}</td>
                <td>${{$order->total_price}}</td>
                @if($order->user)
                <td>
                    <span class="">Name: </span>{{$order->user->name}}<br/>
                    <span class="">Email: </span>{{$order->user->email}}<br/>
                    <span class="">Address: </span>{{$order->user->address}}<br/>
                </td>
                
                @else
                <td>No user Info</td>
                @endif
                <td>{{$order->notes}}</td>
                <td>
                  @if($order->status != null)
                    <div class="{{config('globals.css_order_status')[$order->status]}}">{{$order->status}}</div></td>
                  @else
                    No status
                  @endif
                <td>
                  @if ($order->status != 'SUCCESS' && $order->status != 'FAIL')
                  <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                      @if($order->status == 'NEW')
                      <form action="{{Route('order.updatePending', $order->id)}}" method="POST" id="update-pending">
                        @csrf
                        <a role="button" onclick="document.getElementById('update-pending').submit()" class="update-button dropdown-item">Update pending</a>
                      </form>
                      @elseif($order->status == 'PENDING')
                      <form action="{{Route('order.updateSuccess', $order->id)}}" method="POST" id="update-success">
                        @csrf
                        <a role="button" onclick="document.getElementById('update-success').submit()" class="update-button dropdown-item">Update success</a>
                      </form>
                      <form action="{{Route('order.updateFail', $order->id)}}" method="POST" id="update-fail">
                        @csrf
                        <a role="button" onclick="document.getElementById('update-fail').submit()" class="update-button dropdown-item">Update fail</a>
                      </form>
                      @endif
                    </div>
                  </div>
                  @endif
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