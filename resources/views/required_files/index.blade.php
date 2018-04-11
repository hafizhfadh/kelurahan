@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-header-title">
        <h3>Required Files</h3>
      </div>
      <div class="p-t-5 p-r-5">
        <a id="open-modal" class="button is-primary"><span class="icon is-large"><i class="fas fa-plus"></i></span></a>
      </div>
    </div>
    <div class="card-content">
      <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="datatable">
        <thead>
          <tr>
            <th>No.</th>
            <th>File Name</th>
            <th>Created Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no=1;
          @endphp
          @foreach ($required_files as $a)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $a->name }}</td>
              <td>{{ Carbon\Carbon::parse($a->created_at)->format('l jS \\of F Y h:i:s A') }}</td>
              <td>
                <form action="{{ route('required_files.destroy', $a->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button class="button is-danger is-fullwidth" type="submit"><span class="icon is-small"><i class="fa fa-trash"></i></span></button>
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
  <div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <form action="{{ route('required_files.store') }}" method="post">
        @csrf
        <header class="modal-card-head">
          <p class="modal-card-title">Modal title</p>
        </header>
        <section class="modal-card-body">
          <div class="field">
            <label class="label">File Name</label>
            <p class="control is-expanded">
              <input class="input" type="text" placeholder="e.g KTP" name="name" autofocus>
            </p>
          </div>
        </section>
        <footer class="modal-card-foot">
          <button class="button is-success" type="submit">Save changes</button>
        </footer>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $('#datatable').DataTable();
    document.querySelector('a#open-modal').addEventListener('click', function(event) {
      event.preventDefault();
      var modal = document.querySelector('.modal');  // assuming you have only 1
      var html = document.querySelector('html');
      modal.classList.add('is-active');
      html.classList.add('is-clipped');

      modal.querySelector('.modal-background').addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('is-active');
        html.classList.remove('is-clipped');
      });
    });
  </script>
@endpush
