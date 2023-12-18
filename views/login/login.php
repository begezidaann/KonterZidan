<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form</title> 
     <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  </head>
  <body>
    <div class="container">
      <div id ="message">
      </div>
        <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form id="sample_form">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email" id="email">
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="pw">
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Login" id="action_button">
          </div>
          <div class="signup-link">Not a member? <a href="../register/regis.php">Signup now</a></div>
        </form>
        </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#sample_form').on('submit', function(event){
          event.preventDefault();
          var formData = {
          'email' : $('#email').val(),
          'pw' : $('#pw').val()
          }
          $.ajax({
            url:"http://localhost:8080/KonterZidan/api/auth/login.php",
            method:"POST",
            data: JSON.stringify(formData),
            success:function(data){
              $('#action_button').attr('disabled', false);              
              window.location.href = 'http://localhost:8080/KonterZidan/views/dashboard/index.php';
            },
            error: function(err) {
              console.log(err);
              $('#message').html('<div class="alert alert-danger">'+err.responseJSON+'</div>');
            }
          });
        });
      });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>