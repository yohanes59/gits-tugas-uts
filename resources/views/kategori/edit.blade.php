<form action="/kategori" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="exampleInpuName" class="form-label">Edit Kategori</label>
      <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name">
      @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInpuFoto" class="form-label">Foto</label>
      <input type="file"  class="form-control" name="foto"> <br>
      <img src="" width="100px" alt="">
      @error('foto')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>