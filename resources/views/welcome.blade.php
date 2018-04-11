@extends('layouts.app')

@section('content')
  <div class="columns is-multiline">
    <div class="column">
      <div class="box notification is-primary">
        <div class="heading">Service Available</div>
        <div class="title">{{ count($services) }}</div>
      </div>
    </div>
    <div class="column">
      <div class="box notification is-warning">
        <div class="heading">Order Total</div>
        <div class="title">{{ count($orders) }}</div>
      </div>
    </div>
    <div class="column">
      <div class="box notification is-info">
        <div class="heading">Members Total</div>
        <div class="title">{{ count($members) }}</div>
      </div>
    </div>
  </div>
  <div class="columns is-multiline">
    <div class="column">
        <nav class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Dashboard
                </p>
            </header>

            <div class="card-content">
                {!! $method->html() !!}
            </div>
        </nav>
    </div>
  </div>
@endsection

@push('scripts')
  {!! Charts::scripts() !!}
  {!! $method->script() !!}
@endpush
