@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-header-title">
        <h3>{{ $order->name }}</h3>
      </div>
      <div class="p-t-10 p-r-10">
        @include('pickup_orders.status',['data'=>$order])
      </div>
    </div>
    <div class="card-content">
      <div class="columns is-multiline">
          <div class="column is-half">
            <div class="field">
              <label class="label">Service Name</label>
              <p class="control is-expanded">
                <input class="input" type="text" value="{{ $order->service_type }}" readonly>
              </p>
            </div>
          </div>
          <div class="column is-half">
            <div class="field">
              <label class="label">Action Method</label>
              <p class="control is-expanded">
                <input class="input" type="text" value="{{ $order->action_method }}" readonly>
              </p>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Phone Number</label>
              <p class="control is-expanded">
                <input class="input" type="text" value="{{ $order->phone_number }}" readonly>
              </p>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Recent Phone Number</label>
              <p class="control is-expanded">
                <input class="input" type="text" value="{{ $order->phone_number_now }}" readonly>
              </p>
            </div>
          </div>
          <div class="column is-12">
            <div class="field">
              <label class="label">Address</label>
              <p class="control is-expanded">
                <textarea class="textarea" rows="8" cols="80" readonly>{{ $order->address }}</textarea>
              </p>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
