
@include('home.head')

<div class="container">
  <h2>Users form</h2>
  @if(session()->has('message'))
        <p style="color: red;font-weight: bolder;">{{ session()->get('message') }}</p>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form  action="{{ url('/login') }}" method="post">
    @csrf
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="password" value="{{ old('password') }}">
    </div>
        
    <button type="submit" class="btn btn-default">Sign in</button>
  </form>
  <a href="{{ url('create') }}" class="btn btn-primary">You don't have account, sign up</a>
  </div>