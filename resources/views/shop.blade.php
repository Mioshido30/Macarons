
@extends('layout.master')
@section('title', 'Shop')
@section('navbar-shop', 'active')
@section('content')
<div class="shop-container">
    <div class="container-fluid bg-secondary" style="height:1px;"></div>
    <main class="container">
        <div class="flex d-flex">
            <div class="w-100 py-5 px-4" style="max-width:350px;">
                <div style="position:sticky;top:80px">
                    <div class="filter-category">
                        <a class="nav-link d-flex border border-secondary" data-bs-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <div style="width:8px;height:auto;background-color:#9f6000"></div>
                            <div class="d-flex justify-content-between align-items-center w-100 p-2" style="background-color:#ffe450">
                                <span class="fs-4">Category</span>
                                <i class="fa-solid fa-chevron-down pe-2"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseCategory">
                            <div class="d-flex flex-column">
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="/shop">
                                    <div style="width:8px;height:auto;background-color:#9f6000"></div>
                                    <span class="p-2">All</span>
                                </a>
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="/shop/category/macarons/seasonal">
                                    <div style="width:8px;height:auto;background-color:#9f6000"></div>
                                    <span class="p-2">Seasonal</span>
                                </a>
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="/shop/category/macarons/premium">
                                    <div style="width:8px;height:auto;background-color:#9f6000"></div>
                                    <span class="p-2">Premium</span>
                                </a>
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="/shop/category/macarons/new">
                                    <div style="width:8px;height:auto;background-color:#9f6000"></div>
                                    <span class="p-2">New</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="filter d-flex flex-column mt-5">
                        <a class="nav-link d-flex border border-secondary" data-bs-toggle="collapse" href="#collapsePrice" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <div style="width:8px;height:auto;background-color:#9f6000"></div>
                            <div class="d-flex justify-content-between align-items-center w-100 p-2" style="background-color:#ffe450">
                                <span class="fs-4">Shop by Price</span>
                                <i class="fa-solid fa-chevron-down pe-2"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapsePrice">
                            <div class="d-flex flex-wrap justify-content-evenly pt-3 gap-3">
                                <a href="/shop/category/price/100">
                                    <button type="button" class="btn btn-light">Rp 10.000</button>
                                </a>
                                <a href="/shop/category/price/250">
                                    <button type="button" class="btn btn-light">Rp 25.000</button>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-evenly pt-3 gap-3">
                                <a href="/shop/category/price/500">
                                    <button type="button" class="btn btn-light">Rp 50.000</button>
                                </a>
                                <a href="/shop/category/price/1000">
                                    <button type="button" class="btn btn-light">Rp 100.000</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="filter d-flex flex-column mt-5">
                        <a class="nav-link d-flex border border-secondary" data-bs-toggle="collapse" href="#collapseFlavor" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <div style="width:8px;height:auto;background-color:#9f6000"></div>
                            <div class="d-flex justify-content-between align-items-center w-100 p-2" style="background-color:#ffe450">
                                <span class="fs-4">Shop by Flavor</span>
                                <i class="fa-solid fa-chevron-down pe-2"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseFlavor">
                            <div class="d-flex flex-wrap justify-content-evenly pt-3 gap-3">
                                <a href="/shop/category/flavor/vanilla">
                                    <button type="button" class="btn btn-light">Vanilla</button>
                                </a>
                                <a href="/shop/category/flavor/chocolate">
                                    <button type="button" class="btn btn-light">Chocolate</button>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-evenly pt-3 gap-3">
                                <a href="/shop/category/flavor/fruity">
                                    <button type="button" class="btn btn-light">Fruity</button>
                                </a>
                                <a href="/shop/category/flavor/rainbow">
                                    <button type="button" class="btn btn-light">Rainbow</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 py-5 px-4" style="max-width:900px">
                <div class="d-flex justify-content-end align-items-center p-4 bg-secondary-subtle">
                    <div class="px-2">
                        Sort By
                    </div>
                    <div class="dropdown-center">
                        <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{ $sort }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/shop/filter/featured">Featured</a></li>
                          <li><a class="dropdown-item" href="/shop/filter/low">Low to High</a></li>
                          <li><a class="dropdown-item" href="/shop/filter/high">High to Low</a></li>
                        </ul>
                      </div>
                </div>
                <div class="shop d-flex flex-wrap py-4 gap-4 justify-content-evenly">
                    @forelse ($macarons as $macaron)
                        <div class="card bg-light rounded-4">
                            <div class="position-relative">
                                <img src="{{ $macaron->image_url }}" class="card-img-top rounded-4 object-fit-cover" alt="Macaron">
                            </div>
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
                                <a href="/shop/product/{{$macaron->id}}">
                                    <button type="submit" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Go to Details</button>
                                </a>
                            </div>
                        </div>
                    @empty
                    <div class="d-flex flex-column p-4 align-items-center">
                        <img src="{{ url('/images/sad macaron.png')}}" width="100" alt="Sad Macaron">
                        <span class="fs-2 fw-bold">No Macarons Found...</span>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div style="width:100%;height:200px"></div>
    </main>
</div>
@endsection
