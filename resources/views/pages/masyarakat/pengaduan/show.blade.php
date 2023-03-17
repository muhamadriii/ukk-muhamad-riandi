<h4 class="card-header">Tanggapi Pengaduan</h4>
<div class="card-body">
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
  <textarea style="height:250px" class="form-control" disabled>{{$data->isi}}</textarea>
  <hr>
  <h5>Tanggapan</h5>
  
  <table>
    <tr>
      <td>Petugas</td>
      <td>:</td>
      <td>{{ $data->tanggapan->petugas->name}}</td>
    </tr>
    <tr>
      <td>Ditanggapi pada</td>
      <td>:</td>
      <td>{{ $data->tanggapan->date}}</td>
    </tr>
    <tr>
      <td>isi :</td>
    </tr>
  </table>
  <textarea style="height:250px" class="form-control" disabled >{{ $data->tanggapan->isi}}</textarea>
  
  <div class="d-flex justify-content-end mt-3">
      <a  href="{{ url()->current().'?pdf=true' }}" class="btn btn-warning">Print</a>
  </div>
</div>