@extends('navbar')

@section('title', 'Movie Detail')

@section('content')
  <div class="d-flex">
    <div class="m-5">
      <img src="/storage/{{$books->image}}"  class="img-fluid" alt="">
    </div>
    <div class="p-5">
      <h1>{{$books->title}}</h1>
      <p class="pt-5 pb-5">{{$books->description}}</p>
      <a href="/" type="button" class="btn btn-secondary">Back to Home</a>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Order Now
      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Order Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Click "Confirm" button to confirm your order. Delivery process will be takes 3 days.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a href="/" type="button" class="btn btn-primary" >Confirm</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('footer')