@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-header-title">
        <h3>Service Content</h3>
      </div>
      <div class="p-t-5 p-r-5">
        <a href="{{ route('services.create') }}" class="button is-primary"><span class="icon is-large"><i class="fas fa-plus"></i></span></a>
      </div>
    </div>
    <div class="card-content">
      <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="datatable">
        <thead>
          <tr>
            <th>No.</th>
            <th>Service Name</th>
            <th>File Require</th>
            <th>Created Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no=1;
          @endphp
          @foreach ($services as $a)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $a->service_name }}</td>
              <td>{{ $a->required_file }}</td>
              <td>{{ Carbon\Carbon::parse($a->created_at)->format('l jS \\of F Y h:i:s A') }}</td>
              <td>
                <a href="{{ route('services.edit', $a->id) }}" class="button is-warning is-fullwidth"><span class="icon is-small"><i class="far fa-edit"></i></span></a>
                <form action="{{ route('services.destroy', $a->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button class="button is-danger is-fullwidth" type="submit"><span class="icon is-small"><i class="far fa-trash-alt"></i></span></button>
                </form>
              </td>
            </tr>
            @php
              $no++
            @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $('#datatable').DataTable();
  </script>
@endpush
