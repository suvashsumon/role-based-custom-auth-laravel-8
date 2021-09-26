 <form action="register" method="post">
  @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="{{old('name')}}">

    <label for="psw"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" value="{{old('email')}}">

    <label for="psw-repeat"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw-repeat">
    <hr>
    <button type="submit" class="registerbtn">Register</button>
  </div>
</form> 