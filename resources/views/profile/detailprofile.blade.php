<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/detailprofile.css" />
    <title>Detail Profile Page</title>
  </head>
  <body>
    <nav>
      <img src="assets/images/social-media.png" alt="logo" />
    </nav>
    <main>
      <div class="heading">
        <h1>Welcome! Let's create your profile</h1>
        <p>Let other get to know you better! You can do these later</p>
      </div>
      <div>
        <h2>Add an Avatar</h2>
      </div>
      <div class="avatar">
        <div class="image">
          <img src="assets/images/camera.jpeg" alt="assets" id="Profile-pic" />
        </div>
        <div class="button">
          <div class="choose-image">
            <label for="input-file">Choose image</label>
            <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file"></input>
          </div>
          <div>
            <button class="default"><p>> Or choose one of our defaults</p></button>
          </div>
          <div id="popup">
            <span class="close-button" onclick="closePopup()">X</span>
            <img src="assets/images/Avatars/male1.jpg" alt="Dummy Image 1">
            <img src="assets/images/Avatars/male2.jpg" alt="Dummy Image 2">
            <img src="assets/images/Avatars/male3.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/male4.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/male5.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/female1.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/female2.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/female3.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/female4.jpg" alt="Dummy Image 3">
            <img src="assets/images/Avatars/female5.jpg" alt="Dummy Image 3">
          </div>
        </div>
      </div>
      <form action="{{ route('updateprofile') }}" method="post">
        @method("put")
        @csrf
        <div class="location">
        <label for="name"><h2>Change your Name</h2></label>
        <input value="{{ old('name', Auth::user()->name) }}" type="text" name="location" id="location" placeholder="Change Name">
        @error('name')
          <div class="text-danger mt-2 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="location">
        <label for="email"><h2>Change your Email</h2></label>
        <input value="{{ old('name', Auth::user()->email) }}" type="text" name="location" id="location" placeholder="Change Email">
      </div>
      {{-- <div class="location">
        <label for="location"><h2>Add your Address</h2></label>
        <input type="text" name="location" id="location" placeholder="Enter a location">
      </div> --}}
      <div class="button-text">
        <a href="#"><button type="submit" id="submit">Next</button></a>
        <a href="{{ route('index') }}"><p>Or press return</p></a>
      </div>
      </form>
    </main>
    <script src="assets/js/detailprofile.js"></script>
  </body>
</html>
