@extends('layout.master')

@section('title','Profile')
@php
    $profile = $user->Profile;
@endphp
@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{$user->Profile->image_url}}" alt="mdo" width="300" height="300" class="rounded-circle">
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Edit Photo</button>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$profile->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$profile->email}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$profile->phone}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$profile->address}}</p>
                    </div>
                  </div>
                  <hr>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" class="btn btn-outline-warning text-black py-2 px-4 border-2 rounded-5">Edit Detail</button>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div>
        <h3>Transaction History</h3>
        <table id="courseTable" class="table table-bordered">
            <thead>
                <tr>
                    <td scope="col">Transaction Date</td>
                    <td scope="col">Details</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($histories as $history)
                    <tr scope="row">
                        <td>{{$history->transaction_date}}</td>
                        <td>
                            @foreach ($history->HistoryDetail as $detail)
                                <div>{{$detail->item_name}} ; {{$detail->item_price}} ; {{$detail->quantity}}</div>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr scope="row">
                        <td>
                            No transaction have been made
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">
            {{$histories->withQueryString()->links()}}
        </div>
    </div>
  </section>
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
