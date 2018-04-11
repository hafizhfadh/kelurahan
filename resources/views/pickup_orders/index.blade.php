@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header">
          <div class="card-header-title">
            <h3>Orders</h3>
          </div>
          <div class="p-t-5 p-r-5">
            <a href="{{ route('pickup_orders.create') }}" class="button is-primary"><span class="icon is-large"><i class="fas fa-plus"></i></span></a>
          </div>
        </div>
        <div class="card-content">
          <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="pickup">
            <thead>
              <tr>
                <th>Name</th>
                <th>Service Type</th>
                <th>Service Method</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
    window.Echo.channel('pickup_orders')
    .listen('PickupOrderEvent', function (e) {
      table.ajax.reload();
    });
    var table = $('#pickup').DataTable({
        processing: true,
        serverSide: true,
        ajax : '{{ url('api/datatable/orders') }}',
        columns: [
          { data: 'name' },
          { data: 'service_name' },
          { data: 'action_method' },
          { data: 'status' },
          { data: 'options' },
        ]
      });
  });
  </script>
@endpush
