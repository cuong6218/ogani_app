@extends('ogani.layout.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="template/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> --}}
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{Route('order.store')}}" method="POST">
                    @csrf
                        <input type="hidden" name="total_price" value="{{Session::get('cart.total_price')}}"/>
                        <input type="hidden" name="food_info" value="{{json_encode(Session::get('cart.foods'))}}"/>
                    @if(Auth::user() != null)
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                    @endif
                    
                    <div class="row">

                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Fullname<span>*</span></p>
                                <input name="name" type="text" placeholder="Fullname" value="{{Auth::user()->name}}" disabled class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address" type="text" placeholder="Street Address" value="{{Auth::user()->address}}" disabled  class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="phone" value="{{formatPhoneNumber(Auth::user()->phone)}}" disabled  type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value="{{Auth::user()->email}}" disabled >
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="notes"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach($cart as $food)
                                        <li>{{$food->name}} <span>${{$food->price}}</span></li>
                                    @endforeach
                                </ul>
                                {{-- <div class="checkout__order__subtotal">Fee <span>$ 0.5</span></div> --}}
                                <div class="checkout__order__total">Total <span>${{Session::get('cart.total_price') != null ? Session::get('cart.total_price'):0}}</span></div>
                                <a href="{{Route('cart.clear')}}" class="site-btn">CLEAR ORDER</a>
                                <p>Please check your order and infomation before you place order.</p>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection