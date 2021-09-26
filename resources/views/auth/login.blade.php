 <form action="checklogin" method="post">
  @csrf
  <div class="container">
    <h1>Log In</h1>
    <hr>
    <label for="psw"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email">

    <label for="psw-repeat"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw-repeat">
    <hr>
    <button type="submit" class="registerbtn">Log In</button>
  </div>
</form> 