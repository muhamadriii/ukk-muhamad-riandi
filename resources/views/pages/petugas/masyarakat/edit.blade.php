<h4 class="card-header">update Data</h4>
<div class="card-body">
  <form action="{{ route($route.'update',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="mb-3">
        <label for="village_id" class="form-label">Desa</label>
        <select class="form-control" id="village_id" name="village_id" aria-describedby="village_idHelp">
            <option value="" dishable >-- choose village --</option>
            @foreach($village as $item)
                <option value="{{$item->id}} " {{ $data->village_id == $item->id ? 'selected' : '' }}>{{ $item->name}}</option>
            @endforeach
        </select>
      </div>
  
      <div class="mb-3">
        <label for="nik" class="form-label">Nik</label>
        <input type="number" class="form-control" disabled aria-describedby="nikHelp" value="{{ $data->nik}}">
        <input type="hidden"  name="nik" aria-describedby="nikHelp" value="{{ $data->nik}}">
      </div>
      
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ $data->name}}">
      </div>
      
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" disabled id="username" name="username" aria-describedby="usernameHelp" value="{{ $data->username}}">
        <input type="hidden" class="form-control" id="username" name="username" aria-describedby="usernameHelp" value="{{ $data->username}}">
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" value="">
      </div>
      
      <div class="mb-3">
        <label for="telp" class="form-label">No telepon</label>
        <input type="number" class="form-control" id="telp" name="telp" aria-describedby="telpHelp" value="{{ $data->telp}}">
      </div>
      
      <div class="d-flex justify-content-end">
          <button  class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>