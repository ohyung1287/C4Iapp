<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form id="form_login" method="post" action="{{route('login')}}">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="account" name="account" class="form-control" placeholder="Account" required="required" autofocus="autofocus">
                <label for="account">Account</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                <label for="password">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <a class="btn btn-primary btn-block" href="javascript:form_submit()">Login</a>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
<script type="text/javascript">
  function form_submit(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = {
                _token    : CSRF_TOKEN,
                account   : $('#account').val(),
                password  : $('#password').val(),
    }
    if(!account==""&&!password==""){
      $.ajax({
        url: $('#form_login').attr('action'),
        type: 'POST',
        data: formData,
        dataType: 'JSON',
        success: function (data) { 
          alert(data); 
        },
        error: function (data) {
          alert(data.responseText);
        }
      }); 
    }
  }

</script>