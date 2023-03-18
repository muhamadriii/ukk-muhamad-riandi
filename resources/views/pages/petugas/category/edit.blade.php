<h4 class="card-header">update Data</h4>
<div class="card-body">
  <form action="{{ route($route.'update',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ $data->name}}">
      </div>
      
      <div class="d-flex justify-content-end">
          <button  class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>