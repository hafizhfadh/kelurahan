<a href="{{ route('management.show', $data->id) }}" class="button is-info is-fullwidth"><span class="icon is-smal"><i class="fas fa-eye"></i></span></a>
<a href="{{ route('management.edit', $data->id) }}" class="button is-warning is-fullwidth"><span class="icon is-smal"><i class="fas fa-edit"></i></span></a>

@if ($data->name == 'Superadministrator')
@else
  <button class="button is-danger is-fullwidth"
     onclick="event.preventDefault();document.getElementById('delete-order').submit();">
      <span class="icon is-small"><i class="fas fa-trash"></i></span>
  </button>

  <form id="delete-order" action="{{ route('management.destroy', $data->id) }}" method="POST"
        style="display: none;">
      @csrf
      @method('delete')
  </form>
@endif
