<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  @media screen and (max-width:768px) {

    .margi {
      margin-top: -145px;

    }
  }


  @media screen and (max-width:525px) {

    .margi {
      margin-top: -15px;

    }
  }
</style>

<body style="background-color:  yellowgreen">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="row" style="height: 100vh;">
          <div class="col-md-6 col-12   md-mt-0 p-md-5 p-2 text-center">
            <img src="{{asset('images/login.jpg')}}" class="" style="width: 90%; margin: auto; height: 100%; mix-blend-mode: darken;">

          </div>
          <div class="col-md-6 col-12 p-md-5 margi"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; ">
            <div class="p-md-5 p-3 pb-5"
              style="box-shadow: 2px 2px 2px 4px yellow; border-radius: 20px; width: 100%; background-color: rgb(123, 142, 241);margin: auto;">
              <h2 class="text-center" style="font-weight: bold; color: white;"><img src="{{asset('images/field.png')}}"
                  style="width: 60px; height: 60px; border-radius: 50%;">
                Kusum
                Login</h2>
              <form>

                <div class="p-3"
                  style="position: relative; margin-top: 30px; box-shadow: 2px 2px 4px grey; border-radius: 50px; background-color: white; ">
                  <input type="text" placeholder="Enter E-mail"
                    style="width: calc(100% - 40px); padding-left: 40px; border: none; outline: none;">
                  <i class="fa fa-envelope" aria-hidden="true"
                    style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); font-size: 20px; margin-left: 10px;"></i>
                </div>

                <div class="p-3 "
                  style="position: relative; margin-top: 30px; box-shadow: 2px 2px 4px grey; border-radius: 50px; background-color: white; ">
                  <input type="password" placeholder="Enter password"
                    style="width: calc(100% - 40px); padding-left: 40px; border: none; outline: none;">
                  <i class="fa fa-lock" aria-hidden="true"
                    style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); font-size: 20px; margin-left: 10px;"></i>
                </div>


                <button class="text-center "
                  style="background-color: yellow; color: black; width: 100%; padding: 10px; font-size: 20px;  margin-top: 30px; box-shadow: 2px 2px 4px yellow; border-radius: 50px; border:none ;font-weight: bold; ">Login</button>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>