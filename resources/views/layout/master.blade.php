<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{url('/images/macaron icon.png')}}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://www.dafontfree.net/embed/c25hcC1pdGMtcmVndWxhciZkYXRhLzEvcy83NjAvZGVzaWduLmdyYWZmaXRpLlNOQVBfX19fLnR0Zg" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @cloudinaryJS
</head>
<body>
    <div class="container-fluid d-flex align-items-center justify-content-around">
        @auth
        <div class="d-flex align-items-center gap-1">
            <div class="d-flex" style="width:50px;height:50px">
                <img src="{{$user->Profile->image_url}}" alt="mdo" class="w-100 border border-light object-fit-cover rounded-circle">
            </div>
            <div class="position-relative" style="z-index:10">
                <div class="dropdown position-absolute top-50 start-0 translate-middle-y">
                    <a href="#" class="link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
                        <span class="name fs-5 ps-1">{{ $user->Profile->name }}</span>
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 34px, 0px);">
                    <li>
                        <a class="dropdown-item" href="{{route('profile')}}">
                            <i class="fa-solid fa-user pe-2"></i>
                            Profile
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <i class="fa-solid fa-right-from-bracket pe-2"></i>
                                <input type="submit" value="Sign Out">
                            </form>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        @else
        <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="true">
                    <i class="fa-solid fa-user fa-2x"></i>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 34px, 0px);">
                <li><a class="dropdown-item" href="{{route('login')}}">Sign in</a></li>
                </ul>
            </div>
        @endauth
        <img class="py-3" style="width:140px;" src="{{ url('images/macaron logo.png') }}" alt="Macaron Logo">
        <div class="d-flex align-items-center gap-4">
            <a class="nav-link position-relative" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="fa-solid fa-cart-shopping fa-2x"></i>
                @if(count($cart) != 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color:#036363">
                    {{ count($cart) }}
                    <span class="visually-hidden">cart notifs</span>
                </span>
                @endisset
            </a>
        </div>
        <div class="offcanvas offcanvas-end" style="width:280px" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title" id="offcanvasRightLabel">Your Cart</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="container-fluid bg-secondary" style="height:1px"></div>
            <div class="offcanvas-body">
                @php
                    $total = 0;
                @endphp
                @forelse ($cart as $item)
                    <div class="d-flex gap-2 pb-3">
                        <div class="d-flex bg-primary" style="width:100px;height:100px;">
                            <img class="w-100 object-fit-cover" src="{{ $item->image_url }}" alt="{{ $item->name }} image">
                        </div>
                        <div>
                            <h5 class="title fw-bold">{{ $item->name }}</h5>
                            <p>Rp {{ $item->price }}</p>
                            <p>{{ $item->amount }}x</p>
                        </div>
                    </div>
                    <div class="container-fluid bg-secondary mb-3" style="height:1px"></div>
                    @php
                        $total += $item->price * $item->amount;
                    @endphp
                @empty
                    <div class="d-flex flex-column gap-1 pb-1">
                        <i class="fa-regular fa-face-sad-cry fa-4x text-center"></i>
                        <h5 class="text-center">Cart is empty...</h5>
                    </div>
                    <div class="container-fluid bg-secondary mb-2" style="height:1px"></div>
                @endforelse
                <div class="d-flex justify-content-between pb-2">
                    <h5 class="fw-bold">Total</h5>
                    <h5 class="fw-bold">
                        Rp
                        @if ($cart)
                            {{ $total }}
                        @else
                            -
                        @endif
                    </h5>
                </div>
                <div class="container-fluid bg-secondary" style="height:1px"></div>
                <p class="pt-2 fst-italic">
                    Shipping, taxes, and discounts will be calculated at checkout.
                </p>
                <div class="d-flex justify-content-center">
                    <a href="/cart">
                        <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">View Cart</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary" style="height:1px;"></div>
    <nav class="navbar navbar-expand-lg bg-white bg-opacity-75 p-0 sticky-top" style="z-index:9">
        <div class="container-fluid p-2">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto me-auto">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Collection
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/shop/macaron/Halloween Macaron">
                            <i class="fa-solid fa-spider pe-1"></i>
                            Halloween
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/shop/macaron/Burger Macaron">
                            <i class="fa-solid fa-burger pe-1"></i>
                            Burger
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/shop/macaron/Vogue Macaron">
                            <i class="fa-solid fa-shirt pe-1"></i>
                            Vogue
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item dropdown-center">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Shop
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/shop/category/macarons/seasonal">
                            <i class="fa-brands fa-canadian-maple-leaf pe-1"></i>
                            Seasonal
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/shop/category/macarons/limited">
                            <i class="fa-solid fa-wand-magic-sparkles pe-1"></i>
                            Limited
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/shop/category/macarons/new">
                            <i class="fa-regular fa-face-grin-stars pe-2"></i>
                            New
                        </a>
                    </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/shop">Macaron Cakes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Cup Cakes</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pages
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/cart">
                            <i class="fa-solid fa-cart-shopping pe-1"></i>
                            Cart
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/profile">
                            <i class="fa-solid fa-user pe-2"></i>
                            Profile
                        </a>
                    </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>


    @yield('content')

    <footer class="bg-black">
        <div class="container-fluid triangle-patterns"></div>
        <div class="content container-fluid pt-5 d-flex justify-content-evenly">
            <h3>Contact Us</h3>
            <h3>Help</h3>
            <h3>Support</h3>
            <h3>NewSeller</h3>
        </div>
        <div class="container-fluid py-3 px-5 bg-white d-flex flex-row justify-content-between align-items-center">
            <p>&copy; Copyright 2023 Macaron</p>
            <div>
                Social media
            </div>
        </div>

    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ url('js/script.js') }}"></script>
</html>
