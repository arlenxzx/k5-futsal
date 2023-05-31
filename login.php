<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Akun</title>
  </head>
  <body>

      <div class="position-absolute top-50 start-50 translate-middle">
          <div class="card" style="width:30rem">

            <div class="card-header">
                <h2 class="h4 text-center">LOGIN</h2>
            </div>
              
            <div class="card-body">
                <div class="form-group my-2">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                </div>

                <div class="form-group my-2">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                </div>
                
                
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-login my-2 btn-success">LOGIN</button>
            </div>
        </div>

          <div class="text-center">
            Belum punya akun? <a href="register.php">Silahkan Register</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      $(document).ready(function() {

        $(".btn-login").click( function() {
        
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "cek_login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                //console.log("isi response:"+ response);
                var hasil= response.trim();
                //console.log("isi hasil="+hasil)

                if (hasil == "success") {
                  console.log("login sukses");

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "dashboard.php";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
    </script>

  </body>
</html>