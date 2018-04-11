@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header">
          <div class="card-header-title">Management</div>
          <div class="p-t-5 p-r-5">
            <a href="{{ route('management.create') }}" class="button is-primary"><span class="icon is-large"><i class="fas fa-plus"></i></span></a>
          </div>
        </div>
        <div class="card-content">
          <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="management">
            <thead>
              <tr>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Nik</th>
                <th>Phone Number</th>
                <th>Created At</th>
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
      $('#management').DataTable({
          processing: true,
          serverSide: true,
          ajax : '{{ url('api/datatable/managements') }}',
          columns: [
            { data: 'name' },
            { data: 'email' },
            { data: 'nik' },
            { data: 'phone_number' },
            { data: 'created_at' },
            { data: 'options' },
          ]
        });
    });
  </script>
@endpush
