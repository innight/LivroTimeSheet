
<?php
include_once 'inc/config.php';
include_once 'inc/header.php';
//session_start();

//print_r($_SESSION);

?>

<!-- Login form -->
<div class="container">
<div class="col-sm-6 offset-sm-3 text-center mt-4">
  <h2>Login</h2>
  <form action="/action_page.php" class="form">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>
</div>

</body>
</html>