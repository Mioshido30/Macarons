@extends('layout.master')

@section('title',"{$user->Profile->name}'s Profile")
@php
    $profile = $user->Profile;
@endphp
@section('content')
<div class="profile bg-body-secondary pt-5 px-5" style="padding-bottom:200px">
    <div class="header container d-flex bg-white p-4 justify-content-start gap-4 position-relative" style="max-width:1000px">
        <div class="d-flex" style="width:200px;height:200px;">
            <img src="{{$user->Profile->image_url}}" alt="mdo" class="w-100 object-fit-cover rounded-circle">
        </div>
        <div class="d-flex flex-column gap-1 mw-100" style="width:400px">
            <span class="fs-2 fw-bold">{{$profile->name}}</span>
            <span class="fs-6">{{$profile->email}}</span>
            <span class="fs-6">(+62) {{$profile->phone}}</span>
            <span class="fs-6">{{$profile->address}}</span>
        </div>
        <div class="btn-group position-absolute top-0 end-0 p-3">
            <i class="fa-solid fa-ellipsis fa-2x" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Edit Profile</a></li>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Change Photo</a></li>
            </ul>
          </div>
    </div>
    <div class="container d-flex flex-column bg-white p-4 mt-5 justify-content-start gap-4 position-relative" style="max-width:1000px">
        <h3 class="fw-bold">Transactions History</h3>
        <div style="overflow:scroll;">
            <table class="table table-striped table-hover border">
                <thead>
                    <tr>
                        <td scope="col">Transaction Date</td>
                        <td scope="col">Item Name</td>
                        <td scope="col">Price</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Total Price</td>
                    </tr>
                </thead>
                <tbody>
                @forelse ($histories as $history)
                    @foreach ($history->HistoryDetail as $detail)
                    <tr scope="row">
                        <td>{{$history->transaction_date}}</td>
                        <td>{{$detail->item_name}}</td>
                        <td>{{$detail->item_price}}</td>
                        <td>{{$detail->quantity}}</td>
                        @php
                            $total = $detail->item_price * $detail->quantity;
                        @endphp
                        <td>{{$total}}</td>
                    </tr>
                    @endforeach
                @empty
                    <td>
                        No transaction have been made
                    </td>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination d-flex flex-column">
            {{$histories->withQueryString()->links()}}
        </div>
    </div>
</div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Profile Photo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/update/picture" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="file" name="image" id="image">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
   </div>
   <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Profile Description</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/update/profile" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="id" value="{{$profile->id}}">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control l @error('name') is-invalid @enderror" id="nama" value="{{old('name')}}" placeholder="{{$profile->name}}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control l @error('phone') is-invalid @enderror" id="address" value="{{old('phone')}}" placeholder="{{$profile->phone}}">
                    @error('phone')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control l @error('address') is-invalid @enderror" id="address" value="{{old('address')}}" placeholder="{{$profile->address}}">
                    @error('address')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
   </div>
@endsection
