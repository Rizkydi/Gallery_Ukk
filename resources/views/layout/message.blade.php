@if(count($errors)>0)
    <div class="alert alert-warning" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')  }}
      </div>
@endif