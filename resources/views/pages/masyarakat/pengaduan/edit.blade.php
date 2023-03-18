<h5 class="card-header">Edit Pengaduan {{ $data->judul}}</h5>
<div class="card-body">
  <form action="{{ route($route.'update',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')

      <div class="mb-3">
        <label for="category_id" class="form-label">Kategory pengaduan</label>
        <select class="form-control" id="category_id" name="category_id" aria-describedby="category_idHelp">
            <option value="" dishable selected>-- choose village --</option>
            @foreach ($category as $item)
                <option value="{{$item->id}}" {{ $data->category_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="village_id" class="form-label">Desa tujuan pengaduan</label>
        <select class="form-control" id="village_id" name="village_id" aria-describedby="village_idHelp">
            <option value="" dishable selected>-- choose village --</option>
            @foreach ($village as $item)
                <option value="{{$item->id}}" {{ $data->village_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
            @endforeach
        </select>
      </div>
      
      <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" value="{{ $data->judul}}" name="judul" aria-describedby="judulHelp">
      </div>
      
      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" accept="png,jpg,jpeg,svg" class="form-control" id="foto" name="foto" aria-describedby="fotoHelp">
      </div>
      
      <div class="mb-3">
        <label for="isi" class="form-label">Isi</label>
        <textarea style="height:250px" class="form-control" id="isi" name="isi" aria-describedby="isiHelp">{{ $data->isi}}</textarea>
      </div>
      
      <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>