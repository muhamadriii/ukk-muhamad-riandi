<h4 class="card-header">Create Data</h4>
<div class="card-body">
  <form action="{{ route($route.'store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
      </div>
    
      <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>