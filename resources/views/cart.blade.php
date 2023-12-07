
@extends('layout.master')
@section('title', 'Cart')
@section('content')
<div class="cart">
    <div class="container-fluid d-flex flex-column p-5" style="background-color:#878787;">
        <span class="fs-1 text-white text-center p-2">Your Shopping Cart</span>
        <span class="fs-5 text-white text-center p-2">Home / Your Shopping Cart</span>
    </div>
    <div class="container-fluid px-5" style="padding-bottom: 150px">
        <div class="flex d-flex justify-content-center">
            <div class="cart-product p-5 mw-100" style="width:800px">
                <span class="fw-bold fs-4">Products [{{ count($cart) }}]</span>
                @php
                    $total = 0;
                @endphp
                @forelse ($cart as $item)
                <div class="cart-card container d-flex bg-light p-0 mt-3 mb-4 border border-secondary">
                    <img class="object-fit-cover" src="{{ $item->image_url }}" style="width:230px;height:230px" alt="{{ $item->name }} image">
                    <div class="d-flex flex-column px-4 pt-3 pb-2">
                        <div class="mb-auto">
                            <h3 class="fw-bold">{{ $item->name }}</h3>
                            <span class="fw-bold fs-5 pt-1 pb-2">Rp {{ $item->price }}</span>
                            <div class="d-flex justify-content-around align-items-center py-1 border border-secondary rounded-5 " style="width:85px;">
                                <a class="nav-link" href="/cart/{{$item->id}}/red">-</a>
                                <span class="">{{$item->amount}}</span>
                                <a class="nav-link" href="/cart/{{$item->id}}/add">+</a>
                            </div>
                        </div>
                        <span class="fw-bold fs-5 pt-3">Total : Rp {{$item->amount * $item->price}}</span>
                        @php
                            $total += ($item->price * $item->amount);
                        @endphp
                    </div>
                </div>
                @empty
                <div class="container bg-light p-5 mt-3 mb-4 border border-secondary">
                    <div class="d-flex flex-column justify-content-center align-items-center py-5">
                        <i class="fa-regular fa-face-sad-tear fa-3x"></i>
                        <span class="fs-2">Cart is empty...</span>
                    </div>
                </div>
                @endforelse
                <div class="d-flex justify-content-between">
                    @if (count($cart) != 0)
                    <a href="/shop">
                        <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Continue Shopping</button>
                    </a>
                    @else
                    <a href="/shop">
                        <button type="button" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Start Shopping</button>
                    </a>
                    @endif
                </div>
            </div>
            <div class="pt-5 px-4" style="padding-bottom:150px;">
                <div class="container" style="position:sticky;top:100px;">
                    <span class="fw-bold fs-4">Order Summary</span>
                    <span class="fw-bold fs-5 mt-3">Subtotal : Rp {{ $total }}</span>
                    <div class="form-floating py-2">
                        <textarea class="form-control border-2 border-warning rounded-4" placeholder="Add notes here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Add note to your order</label>
                    </div>
                    <p class="py-2 fst-italic">Shipping, taxes, and discounts will be calculated at checkout</p>
                    <div class="d-flex justify-content-center py-1">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title fs-5" id="staticBackdropLabel">Checkout Message</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yay, you checked out your order!
                <i class="fa-regular fa-face-laugh-squint"></i>
                <br>
                Check your transactions in your Profile!
            </div>
            <div class="modal-footer">
                <form action="/history/add" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
