@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="card-header-title">
        <h3>Edit User Profile</h3>
      </div>
    </div>
    <div class="card-content">
      <form action="{{ route('management.update', $management->id) }}" method="post" id="role">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
          <div class="columns">
            <div class="column">
              @if ($management->name == 'Superadministrator')
                <div class="field">
                  <label class="label">Name</label>
                  <p class="control is-expanded">
                    <input class="input" type="text" name="name" value="{{ $management->name }}" readonly>
                  </p>
                </div>
              @else
                <div class="field">
                  <label class="label">Name</label>
                  <p class="control is-expanded">
                    <input class="input" type="text" name="name" value="{{ $management->name }}">
                  </p>
                </div>
              @endif
            </div>
            <div class="column">
              <div class="field">
                <label class="label">Email</label>
                <p class="control is-expanded">
                  <input class="input" type="email" name="email" required>
                </p>
              </div>
            </div>
          </div>
          <div class="columns">
            <div class="column is-half">
              <div class="field">
                <label class="label">Password</label>
                <p class="control is-expanded">
                  <input class="input" type="password" name="password" id="pwd" required>
                </p>
                <label class="checkbox">
                  <input type="checkbox" id="show-hide">
                  Show Password
                </label>
              </div>
            </div>
          </div>
          <button type="submit" name="button" class="button is-primary">Save</button>
          <a href="{{ route('management.index') }}" class="button">Cancel</a>
      </form>
    </div>
  </div>
@endsection


@push('scripts')
  <script type="text/javascript">
  (function() {

    var PasswordToggler = function( element, field ) {
      this.element = element;
      this.field = field;

      this.toggle();
    };

    PasswordToggler.prototype = {
      toggle: function() {
        var self = this;
        self.element.addEventListener( "change", function() {
          if( self.element.checked ) {
            self.field.setAttribute( "type", "text" );
          } else {
            self.field.setAttribute( "type", "password" );
          }
              }, false);
      }
    };

    document.addEventListener( "DOMContentLoaded", function() {
      var checkbox = document.querySelector( "#show-hide" ),
        pwd = document.querySelector( "#pwd" ),
        form = document.querySelector( "#role" );

        var toggler = new PasswordToggler( checkbox, pwd );

    });

    })();
  </script>
@endpush
