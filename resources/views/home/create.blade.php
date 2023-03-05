
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
  <form  action="{{ url('/create') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="password" value="{{ old('password') }}">
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="re_password" value="{{ old('re_password') }}">
    </div>
    <div class="form-group">
      <label for="pwd">Profile picture:</label>
      <input type="file" class="form-control" id="pwd" placeholder="profile" name="profile">
    </div>
    
    <button type="submit" class="btn btn-default">Create new user</button>
  </form>
  <a href="{{ url('/login') }}" class="btn btn-primary">You have account, sign in</a>
  </div>