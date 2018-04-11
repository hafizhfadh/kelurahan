@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-header-title">
        <h3>Service Content</h3>
      </div>
    </div>
    <div class="card-content">
      <form action="{{ route('services.store') }}" method="post">
        @csrf
        <div class="columns is-multiline">
            <div class="column">

              <div class="field">
                <label class="label">Service Name</label>
                <p class="control is-expanded">
                  <input class="input" type="text" placeholder="e.g Pembuatan KTP" name="service_name">
                </p>
              </div>

              <div class="field">
                <label class="label">Required File</label>
                <p class="control is-expanded">
                  <select class="input" style="width:500px;" id="required_file" multiple="multiple" name="required_file[]"></select>
                </p>
              </div>

              <div class="field">
                <label class="label">Detail</label>
                <p class="control is-expanded">
                  <textarea rows="8" cols="80" class="textarea" name="detail"></textarea>
                </p>
              </div>

            </div>
          </div>
          <button type="submit" name="button" class="button is-primary">Save</button>
          <a href="{{ route('services.index') }}" class="button">Cancel</a>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
  $('#required_file').select2({
        placeholder: 'Select an item',
        ajax: {
          url: '/api/required_file',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.name,
                        id: item.name
                    }
                })
            };
          },
          cache: true
        }
      });
    CKEDITOR.replace( 'detail' );
  </script>
@endpush
