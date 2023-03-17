<h4 class="card-header">Tanggapi Pengaduan</h4>
<div class="card-body">
  <form action="{{ route('petugas.tanggapan',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <table>
        <tr>
          <td>tujuan</td>
          <td>:</td>
          <td>{{'desa '.$data->village->name ?? '-'}}</td>
        </tr>
        <tr>
          <td>kategori</td>
          <td>:</td>
          <td>{{$data->category->name ?? '-'}}</td>
        </tr>
        <tr>
          <td>pelapor</td>
          <td>:</td>
          <td>{{ $data->pengadu->name ?? '-'}}</td>
        </tr>
        <tr>
          <td>date</td>
          <td>:</td>
          <td>{{ $data->date}}</td>
        </tr>
        <tr>
          <td>judul</td>
          <td>:</td>
          <td>{{ $data->judul}}</td>
        </tr>
        <tr>
          <td>status</td>
          <td>:</td>
          <td>{{ $data->status}}</td>
        </tr>
        <tr>
          <td>isi :</td>
        </tr>
      </table>
      {{$data->isi}}
      <hr>
      <h5>Tanggapan</h5>
      <div class="mb-3">
        <label for="status" class="form-label">status pengaduan</label>
        <select class="form-control" id="status" name="status" aria-describedby="statusHelp">
            <option value="" dishable selected>-- choose village --</option>
            <option value="proses" {{ $data->status == 'proses' ? 'selected' :'' }}>proses</option>
            <option value="selesai" {{ $data->status == 'selesai' ? 'selected' :'' }}>selesai</option>
        </select>
      </div>
      
      <div class="mb-3">
        <label for="isi" class="form-label">isi tanggapan</label>
        <textarea style="height: 250px" class="form-control" id="isi" name="isi" aria-describedby="isiHelp" value="">{{ $data->tanggapan->isi ?? ''}}</textarea>
      </div>
      
      <div class="d-flex justify-content-end">
          <button  class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>