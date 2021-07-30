@extends('layouts.appNoJS')
@section('content')

<div class="container">
    <div class="border row">
        <div class="col">
            <h4 class="text-secondary">ID: {{ $structure->id }}</h4>

            <div class="text-left">
                <h5 class="text-primary">Nome Struttura: {{ $structure->name }}</h5>
                <div>
                    <img src="{{ $structure->cover_image_url ? asset('storage/' . $structure->cover_img_url) : 'https://www.linga.org/site/photos/Largnewsimages/image-not-found.png'}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('user.structures.payment', $structure->id) }}" id="postform" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-check form-check-inline">
            @foreach($sponsorships as $sponsorship)

            <label for="{{$sponsorship->id}}">{{$sponsorship->duration}} ORE <br>{{$sponsorship->price}} € </label>
            <input type="radio" name="sponsorship" id="{{$sponsorship->id}}" value="{{$sponsorship->id}}" required>
            <div class="invalid-feedback">Please choose an option</div>

            @endforeach
        </div>
        <div>
        
            <div id="dropin-container"></div>
            <button type='button' id="submit-button" class="button button--small button--green">Purchase</button>
        
        </div>
    </form>


</div>
@endsection

@section('script')

<script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.js"></script>

<script src="{{ asset('js/paymentsScript.js') }}" defer"></script>

@endsection

<style>

.button {
  cursor: pointer;
  font-weight: 500;
  left: 3px;
  line-height: inherit;
  position: relative;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  -webkit-appearance: none;
  -moz-appearance: none;
  display: inline-block;
}

.button--small {
  padding: 10px 20px;
  font-size: 0.875rem;
}

.button--green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}

.button--green:hover {
  background-color: #8bdda8;
  color: white;
}

</style>

