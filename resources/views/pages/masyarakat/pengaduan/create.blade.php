<h4 class="card-header">Buat Pengaduan</h4>
<div class="card-body">
  <form action="{{ route($route.'store')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="category_id" class="form-label">category pengaduan</label>
        <select class="form-control" id="category_id" name="category_id" aria-describedby="category_idHelp">
            <option value="" dishable selected>-- choose village --</option>
            @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="village_id" class="form-label">tujuan sekertariat pengaduan</label>
        <select class="form-control" id="village_id" name="village_id" aria-describedby="village_idHelp">
            <option value="" dishable selected>-- choose village --</option>
            @foreach ($village as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
      </div>
      
      <div class="mb-3">
        <label for="judul" class="form-label">judul</label>
        <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judulHelp">
      </div>
      
      <div class="mb-3">
        <label for="foto" class="form-label">foto</label>
        <input type="file" accept="png,jpg,jpeg,svg" class="form-control" id="foto" name="foto" aria-describedby="fotoHelp">
      </div>
      
      <div class="mb-3">
        <label for="isi" class="form-label">isi</label>
        <textarea style="height:250px" class="form-control" id="isi" name="isi" aria-describedby="isiHelp"></textarea>
      </div>
      
      <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>