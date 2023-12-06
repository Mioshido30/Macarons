
@extends('layout.master')
@section('title', $macaron->name)
@section('content')
<div>
    <div class="product-header container-fluid d-flex flex-column p-4 position-relative" style="background-image: url('{{ $macaron->image_url }}');">
        <div class="w-100 h-100 bg-white bg-opacity-50 position-absolute top-0 start-0" style="z-index:2"></div>
        <span class="fs-2 fw-bold text-center p-2" style="z-index:3">Product Details</span>
    </div>
    <div class="container-fluid p-5 d-flex justify-content-center">
        <div class="d-flex flex-wrap py-3 gap-5 justify-content-evenly" style="max-width:1100px">
            <div class="d-flex justify-content-center">
                <div class="d-flex mw-100" style="width:400px;height:400px">
                    <img class="w-100 d-block img-thumbnail object-fit-cover rounded-5" src="{{ $macaron->image_url }}" alt="{{ $macaron->name }} image">
                </div>
            </div>
            <div class="d-flex flex-column detail-card">
                <div class="tags d-flex flex-wrap gap-2 py-2">
                    <button class="btn btn-outline-dark">{{ $macaron->flavor }}</button>
                    @foreach ($category as $tags)
                        @if ($tags == "Yes")
                            <button class="btn btn-outline-danger">Best Selling</button>
                        @elseif ($tags == "Seasonal")
                            <button class="btn btn-outline-success">{{ $tags }}</button>
                        @elseif($tags == "Limited")
                            <button class="btn btn-outline-info">{{ $tags }}</button>
                        @elseif($tags == "New")
                            <button class="btn btn-outline-warning">{{ $tags }}</button>
                        @endif
                    @endforeach
                </div>
                <div class="details-desc d-flex flex-column mw-100 gap-2" style="width:400px">
                    <h1>{{ $macaron->name }}</h1>
                    <h5>Rp {{ $macaron->price }}</h5>
                    <div class="pb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i > $macaron->ratings)
                                <i class="fa-regular fa-star"></i>
                            @else
                                <i class="fa-solid fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span>{{ $macaron->description }}</span>
                    <div class="pt-5">
                        <form class="d-flex gap-3" action="{{ url('/cart/insert', ['macaron' => $macaron->id]) }}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-around align-items-center py-1 border border-2 border-warning rounded-5 " style="width:85px;">
                                <span class="minus">-</span>
                                <span class="amount">1</span>
                                <span class="plus">+</span>
                                <input id="amount" type="hidden" name="amount" value="1">
                            </div>
                            <button type="submit" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
