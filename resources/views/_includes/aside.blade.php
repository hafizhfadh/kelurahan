@role(['superadministrator','admin'])
  <aside class="column is-2 aside is-hidden-mobile is-clearfix">
  <nav class="menu">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list is-tab">
      <li><a href="{{ url('/') }}"><span class="icon is-small"><i class="fas fa-tachometer-alt"></i></span> Dashboard</a></li>
    </ul>
    <p class="menu-label">
      Administration
    </p>
    <ul class="menu-list is-tab">
      <li>
        <a id="menu"><i class="fa fa-cog"></i> Pickup Order System</a>
        <ul id="sub" class="is-active">
          <li><a href="{{ route('services.index') }}"><span class="icon is-small"><i class="fas fa-pencil-alt"></i></span> Services</a></li>
          <li><a href="{{ route('required_files.index') }}"><span class="icon is-small"><i class="fas fa-file"></i></span> Required File</a></li>
          <li><a href="{{ route('pickup_orders.index') }}"><span class="icon is-small"><i class="fas fa-tasks"></i></span> Orders</a></li>
        </ul>
      </li>
    </ul>
    @role('superadministrator')
      <p class="menu-label">
        Role Settings
      </p>
      <ul class="menu-list is-tab">
        <li><a href="{{ route('management.index') }}"><span class="icon is-small"><i class="fas fa-users"></i></span> Management</a></li>
      </ul>
    @endrole
    <nav class="menu-label m-t-300">
      <b>Application Version : {{ app()->version() }}</b>
    </nav>
  </nav>
</aside>
@endrole
