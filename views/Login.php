<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="/assets/js/login.js"></script>
</head>
<body>
    <div class="main-container">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 offset-4 p-5">
                        <div class="card p-3">
                            <h3 class="mt-3">Login</h3>
                            <hr class="mt-0 mb-3" />
                            <div class="form-group">
                                <label for="emailID">Email ID</label>
                                <input type="text" name="emailID" id="emailID" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <div class="form-group text-right">
                                <a href="/signup/signup" target="_blank" rel="noopener noreferrer">Sign Up</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-submit btn-block validate-login">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>