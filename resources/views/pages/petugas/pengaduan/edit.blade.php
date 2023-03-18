<h4 class="card-header">Tanggapi Pengaduan</h4>
<div class="card-body">
  <form action="{{ route('petugas.tanggapan',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <table>
        <tr>
          <td>Tujuan</td>
          <td>:</td>
          <td>{{'desa '.$data->village->name ?? '-'}}</td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>:</td>
          <td>{{$data->category->name ?? '-'}}</td>
        </tr>
        <tr>
          <td>Pelapor</td>
          <td>:</td>
          <td>{{ $data->pengadu->name ?? '-'}}</td>
        </tr>
        <tr>
          <td>Tanggal pengaduan</td>
          <td>:</td>
          <td>{{ $data->date}}</td>
        </tr>
        <tr>
          <td>Judul</td>
          <td>:</td>
          <td>{{ $data->judul}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td>{{ $data->status}}</td>
        </tr>
        <tr>
          <td>Isi :</td>
        </tr>
      </table>
      <div>
        {{$data->isi}}
      </div>
      <hr>
      <h5>Tanggapan</h5>
      <div class="mb-3">
        <label for="status" class="form-label">Status pengaduan</label>
        <select class="form-control" id="status" name="status" aria-describedby="statusHelp">
            <option value="" dishable selected>-- choose village --</option>
            <option value="proses" {{ $data->status == 'proses' ? 'selected' :'' }}>proses</option>
            <option value="selesai" {{ $data->status == 'selesai' ? 'selected' :'' }}>selesai</option>
        </select>
      </div>
      
      <div class="mb-3">
        <label for="isi" class="form-label">Isi tanggapan</label>
        <textarea style="height: 250px" class="form-control" id="isi" name="isi" aria-describedby="isiHelp" value="">{{ $data->tanggapan->isi ?? ''}}</textarea>
      </div>
      
      <div class="d-flex justify-content-end">
        @if ($data->status == 'proses' && $data->tanggapan)
        <a href="{{ url()->current().'?pdf=true' }}" class="btn btn-warning me-1">Print</a>
        @endif
        <button  class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>