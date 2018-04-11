<a href="{{ route('pickup_orders.show', $data->id) }}" class="button is-info is-fullwidth"><span class="icon"><i class="fas fa-eye"></i></span></a>
<a href="{{ route('pickup_orders.edit', $data->id) }}" class="button is-warning is-fullwidth"><span class="icon"><i class="fas fa-edit"></i></span></a>
<form action="{{ route('pickup_orders.destroy',$data->id) }}" method="POST">
  {{ csrf_field() }}
  <input name="_method" type="hidden" value="DELETE">
  <button type="submit" class="button is-danger is-fullwidth"><span class="icon"><i class="fas fa-trash"></i></span></button>
</form>
