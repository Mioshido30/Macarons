
@extends('layout.master')
@section('title', 'Shop')
@section('navbar-shop', 'active')
@section('content')
<div>
    <div class="container-fluid bg-secondary" style="height:1px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-4 pt-5 px-4" style="padding-bottom:200px;">
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
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="#">
                                    <div style="width:8px;height:auto;background-color:#9f6000"></div>
                                    <span class="p-2">Seasonal</span>
                                </a>
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="#">
                                    <div style="width:8px;height:auto;background-color:#9f6000"></div>
                                    <span class="p-2">Limited</span>
                                </a>
                                <a class="nav-link d-flex border border-secondary bg-warning-subtle" href="#">
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
                                <button type="button" class="btn btn-light">Rp 100.000</button>
                                <button type="button" class="btn btn-light">Rp 250.000</button>
                            </div>
                            <div class="d-flex flex-wrap justify-content-evenly pt-3 gap-3">
                                <button type="button" class="btn btn-light">Rp 500.000</button>
                                <button type="button" class="btn btn-light">Rp 1.000.000</button>
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
                                <button type="button" class="btn btn-light">Vanilla</button>
                                <button type="button" class="btn btn-light">Chocolate</button>
                            </div>
                            <div class="d-flex flex-wrap justify-content-evenly pt-3 gap-3">
                                <button type="button" class="btn btn-light">Fruity</button>
                                <button type="button" class="btn btn-light">Rainbow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 py-5 px-4">
                <div class="d-flex justify-content-end align-items-center p-4 bg-secondary-subtle">
                    <div class="px-2">
                        Sort By
                    </div>
                    <div class="dropdown-center">
                        <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Filter
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Featured</a></li>
                          <li><a class="dropdown-item" href="#">Low to High</a></li>
                          <li><a class="dropdown-item" href="#">High to Low</a></li>
                        </ul>
                      </div>
                </div>
                <div class="shop d-flex flex-wrap py-4 gap-4 justify-content-evenly">
                    @forelse ($macarons as $macaron)
                        <div class="card bg-light rounded-4">
                            <div class="position-relative">
                                <a class="nav-link" href="#">
                                    <img src="{{ $macaron->image_url }}" class="card-img-top rounded-4 object-fit-cover" alt="Rainbow Macaron">
                                    <div class="hide bg-white bg-opacity-75 rounded-5 justify-content-center align-items-center position-absolute top-50 start-50 translate-middle" style="width:50px;height:50px">
                                        <i class="fa-regular fa-heart fa-2x"></i>
                                    </div>
                                </a>
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
                                <h5 class="fw-bold py-1">Rp {{ $macaron->price }}</h5>
                                <form action="{{ url('/cart/insert', ['macaron' => $macaron->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <h1>No Macarons Found???</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
