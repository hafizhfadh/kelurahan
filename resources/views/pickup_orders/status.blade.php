<div class="tags has-addons">
  <span class="tag is-dark">Status</span>
  @if ($data->status == 'Menunggu')
    <span class="tag is-warning is-rounded">
      Menunggu
    </span>
  @elseif ($data->status == 'Mengambil File')
    <span class="tag is-primary is-rounded">
      Mengambil File
    </span>
  @elseif ($data->status == 'File Sedang Di Proses')
    <span class="tag is-info is-rounded">
      File Sedang Di Proses
    </span>
  @elseif ($data->status == 'Selesai')
    <span class="tag is-success is-rounded">
      Selesai
    </span>
  @elseif ($data->status)
    <span class="tag is-danger is-rounded">
      <b>INVALID</b>
    </span>
  @endif
</div>
