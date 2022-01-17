<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="template/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="{{Route('cart.list')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="template/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="{{Route('user.showLogin')}}"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{Route('ogani.index')}}">Home</a></li>
            <li><a href="{{Route('ogani.shop-grid')}}">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="{{Route('ogani.blog')}}">Blog</a></li>
            <li><a href="{{Route('ogani.contact')}}">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="template/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__language">
                            @if (Auth::user() != NULL)
                            <div>{{Auth::user()->email }}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="{{Route('user.logout')}}">Logout</a></li>
                            </ul>    
                            @else
                                <a href="{{Route('user.showLogin')}}"><i class="fa fa-user"></i> Login</a>
                            @endif
                        </div>
                        {{-- <div class="header__top__right__auth">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::get("error"))
    <div class="alert alert-danger" id="alert-message">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{Session::get("error")}}
    </div>
    @elseif(Session::get("success"))
    <div class="alert alert-success" id="alert-message">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{Session::get("success")}}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{Route('ogani.index')}}"><img src="template/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li @if(checkCurrentUrl('ogani.index')) class="active" @endif ><a href="{{Route('ogani.index')}}">Home</a></li>
                        <li @if(checkCurrentUrl('cart.list')) class="active" @endif ><a href="{{Route('cart.list')}}">Shoping Cart</a></li>
                        {{-- <li><a href="{{Route('ogani.shop-grid')}}">Shop</a></li> --}}
                        {{-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li @if(checkCurrentUrl('ogani.blog')) class="active" @endif><a href="{{Route('ogani.blog')}}">Blog</a></li>
                        <li @if(checkCurrentUrl('ogani.contact')) class="active" @endif><a href="{{Route('ogani.contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{Route('cart.list')}}"><i class="fa fa-shopping-bag"></i> <span>@if(is_array(Session::get('cart.foods'))){{count(Session::get('cart.foods'))}} @else 0 @endif</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>${{Session::get('cart.total_price') != null? Session::get('cart.total_price'):0}}</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero @if(checkCurrentUrl('cart.list') || 
                        checkCurrentUrl('ogani.search') ||
                        checkCurrentUrl('ogani.contact') ||
                        checkCurrentUrl('ogani.blog')) hero-normal @endif">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach($categories_header as $category)
                            <li><a href="{{Route('category.show', $category->id)}}">{{$category->name}}</a></li>
                        @endforeach 
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{Route('ogani.search')}}" method="">
                            {{ csrf_field() }}
                            {{-- <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div> --}}
                            <input type="text" name="name" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                @if(!checkCurrentUrl('cart.list') && 
                    !checkCurrentUrl('ogani.search') &&
                    !checkCurrentUrl('ogani.blog') &&
                    !checkCurrentUrl('ogani.contact'))
                <div class="hero__item set-bg" data-setbg="template/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->