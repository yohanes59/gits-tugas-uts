<form action="{{url('/kategori/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInpuName" class="form-label">Tambah Kategori</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
      @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInpuImage" class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
      @error('image')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>