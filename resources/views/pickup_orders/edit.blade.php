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
      <form action="{{ route('pickup_orders.update', $order->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="columns is-multiline">
            <div class="column is-half">
              <div class="field">
                <label class="label">Customer Name</label>
                <p class="control is-expanded">
                  <input class="input" type="text" name="name" value="{{ $order->name }}">
                </p>
              </div>
              <div class="field">
                <label class="label">Service Name</label>
                <p class="control is-expanded">
                  <select class="input" style="width:500px;" id="services" name="service_name" value="{{ $order->service_name }}" required>
                    <option value="{{ $order->service_name }}">{{ $order->service_name }}</option>
                  </select>
                </p>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Phone Number</label>
                <p class="control is-expanded">
                  <input class="input" type="text" name="phone_number" value="{{ $order->phone_number }}">
                </p>
              </div>
              <div class="field">
                <label class="label">Recent Phone Number</label>
                <p class="control is-expanded">
                  <input class="input" type="text" name="phone_number_now" value="{{ $order->phone_number_now }}">
                </p>
              </div>
            </div>
            <div class="column is-half">
              <div class="field">
                <label class="label">Action Method</label>
                <p class="control is-expanded">
                  <span class="select">
                    <select name="action_method">
                      @foreach ($method as $a)
                        <option value="{{ $a }}">{{ $a }}</option>
                      @endforeach
                    </select>
                  </span>
                </p>
              </div>
              <div class="field">
                <label class="label">Status</label>
                <p class="control is-expanded">
                  <span class="select">
                    <select name="status">
                      @foreach ($status as $a)
                        <option value="{{ $a }}">{{ $a }}</option>
                      @endforeach
                    </select>
                  </span>
                </p>
              </div>
            </div>
            <div class="column is-12">
              <div class="field">
                <label class="label">Address</label>
                <p class="control is-expanded">
                  <textarea class="textarea" rows="8" cols="80" name="address">{{ $order->address }}</textarea>
                </p>
              </div>
            </div>
          </div>
          <button type="submit" class="button is-success">Edit</button>
          <a href="{{ route('pickup_orders.index') }}" class="button">Cancel</a>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
  $('#services').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/api/get_services',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.service_name,
                        id: item.service_name
                    }
                })
            };
          },
          cache: true
        }
      });
    CKEDITOR.replace( 'address' );
  </script>
@endpush
