<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Create Post</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="assets/css/createalbum.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="demo-page">
  <div class="demo-page-navigation">
    <nav>
      <ul>
        <li>
          <a href="{{ route('index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool">
              <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
            </svg>
            Back To Home</a>
        </li>
      </ul>
    </nav>
  </div>
  <main class="demo-page-content">
    <section>
      <div class="href-target" id="input-types"></div>
      <h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
          <line x1="21" y1="10" x2="3" y2="10" />
          <line x1="21" y1="6" x2="3" y2="6" />
          <line x1="21" y1="14" x2="3" y2="14" />
          <line x1="21" y1="18" x2="3" y2="18" />
        </svg>
        Create Your Post
      </h1>

      <form action="{{ route('fotos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="nice-form-group">
        <label>Judul Foto</label>
        <input name="judul_foto" type="text" placeholder="Judul Post" class="post-content">
        @error('judul_foto')
            <div class="input-group has-validation"
                style="color: red; font-family: 'Cairo', sans-serif; font-size: 15px;">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="nice-form-group">
        <label>Description foto</label>
        <input name="deskripsi_foto" type="text" placeholder="Deskripsi Post" class="post-content">
                    @error('deskripsi_foto')
                        <div class="input-group has-validation"
                            style="color: red; font-family: 'Cairo', sans-serif; font-size: 15px;">
                            {{ $message }}
                        </div>
                    @enderror
      </div>

      <input type="file" id="media" name="lokasi_file" accept="image/jpeg, image/png, image/gif"
                        class="hide choose-media" style="margin-top: 15px;">
                    <label for="media" class="add-media"><i class='bx bxs-image-alt'></i></label>
      <div class="nice-form-group" style="margin-top: 20px">

        <select class="form-select" aria-label="Default select example">
                        <option selected>Pilih Album</option>
                        @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                        @endforeach
                      </select>  
        <button type="submit" class="btn btn-outline-success" style="margin-top: 20px;">Submit</button>
    </div>
    </form>
    </section>
  </main>
</div>
<!-- partial -->
  
</body>
</html>
