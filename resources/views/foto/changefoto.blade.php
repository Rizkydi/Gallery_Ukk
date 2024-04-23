<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Change Data Foto</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('assets/css/editfoto.css') }}">

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
      <div class="href-target" id="structure"></div>
      <h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
          <polygon points="12 2 2 7 12 12 22 7 12 2" />
          <polyline points="2 17 12 22 22 17" />
          <polyline points="2 12 12 17 22 12" />
        </svg>
        Edit Your Post
      </h1>

      <form action="{{ route('foto.update', $foto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="nice-form-group">
            <label for="judul_foto">Judul Foto</label>
            <input type="text" id="judul_foto" name="judul_foto" value="{{ $foto->judul_foto }}" placeholder="Your Judul foto">
        </div>
        <div class="nice-form-group">
            <label for="deskripsi_foto">Deskripsi Foto</label>
            <textarea id="deskripsi_foto" name="deskripsi_foto" placeholder="Your Deskripsi foto">{{ $foto->deskripsi_foto }}</textarea>
        </div>
        <div class="nice-form-group" style="margin-top: 20px">
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
    </form>    
      
    </section>
  </main>
</div>
<!-- partial -->
  
</body>
</html>
