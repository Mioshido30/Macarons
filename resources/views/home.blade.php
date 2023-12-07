
@extends('layout.master')
@section('title', 'Home')
@section('navbar-home', 'selected')
@section('content')
<div>
    <div class="bg-danger position-relative" >
        <div class="container-fluid triangle-patterns"></div>
        <div class="container-fluid triangle-patterns-prop position-absolute"></div>
    </div>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="max-height:400px;">
            <div class="banner-image"></div>
          </div>
          <div class="carousel-item" style="max-height:400px;">
            <div class="banner-image"></div>
          </div>
          <div class="carousel-item" style="max-height:400px;">
            <div class="banner-image"></div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <i class="fa-solid fa-circle-chevron-right fa-rotate-180 fa-2x" style="color: #cbe558;"></i>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <i class="fa-solid fa-circle-chevron-right fa-2x" style="color: #cbe558;"></i>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <div class="container-fluid p-5 pb-4 d-flex flex-column align-items-center">
        <img src="images/macaron.png" style="width:80px" alt="Macaron">
        <h5 class="fw-bold pt-2">Macaron</h5>
        <h2 style="color:#cbe558;">Feel the Taste</h2>
    </div>

    <div class="container-fluid d-flex flex-wrap justify-content-evenly">
        <div class="card border-0 m-2">
            <img src="images/macarons/rainbow macaron.jpeg" class="card-img-top rounded-5 object-fit-cover" alt="Rainbow Macaron">
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title fw-bold">Rainbow Macaron</h5>
              <p class="card-text">Macaron made with rainbow flavors... Rainbows... Yum.. G.. yum... G... Not what you're thinking okay...</p>
              <a href="/shop">
                <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Shop Now</button>
              </a>
            </div>
        </div>
        <div class="card border-0 m-2">
            <img src="images/macarons/mocha macaron.jpg" class="card-img-top rounded-5 object-fit-cover" alt="Rainbow Macaron">
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title fw-bold">Mocha Macaron</h5>
              <p class="card-text">Coffee flavored macarons makes me up HARD every morning and night. Not sus btw.</p>
              <a href="/shop">
                <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Shop Now</button>
              </a>
            </div>
        </div>
        <div class="card border-0 m-2">
            <img src="images/macarons/mint macaron.jpg" class="card-img-top rounded-5 object-fit-cover" alt="Rainbow Macaron">
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title fw-bold">Mint Macaron</h5>
              <p class="card-text">Cold feeling from the breeze of Minty tasty macaronies slap my shivering cakes. The actual cake...</p>
              <a href="/shop">
                <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Shop Now</button>
              </a>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5 pb-4 d-flex flex-column align-items-center">
        <img src="images/macaron.png" style="width:80px" alt="Macaron">
        <h5 class="fw-bold pt-2">For any Party</h5>
        <h2 style="color:#cbe558;">Best Selling Products</h2>
    </div>

    <div class="container d-flex justify-content-center" style="padding-bottom: 200px">
        <div class="owl-carousel owl-theme">
            @forelse ($macarons as $macaron)
                <div class="item d-flex justify-content-center">
                    <div class="card bg-light m-2 rounded-5">
                        <img src="{{ $macaron->image_url }}" class="card-img-top rounded-5 object-fit-cover" alt="Rainbow Macaron">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title fw-bold">{{ $macaron->name }}</h5>
                            <div class="pb-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i > $macaron->ratings)
                                        <i class="fa-regular fa-star"></i>
                                    @else
                                        <i class="fa-solid fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="fw-bold fs-5 py-1">Rp {{ $macaron->price }}</span>
                            <a class="pt-1" href="/shop/product/{{$macaron->id}}">
                                <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Go to Details</button>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <h1>Empty? That's Weird...</h1>
            @endforelse
        </div>
    </div>


</div>

@endsection
