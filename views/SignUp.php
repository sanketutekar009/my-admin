<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Custom JS -->
    <script src="/assets/js/sign-up.js"></script>
</head>
<body>
    <div class="main-container">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 offset-3 p-5">
                        <div class="card p-3">
                            <h3 class="mt-3 mb-3">Sign Up</h3>
                            <hr class="mt-0 mb-3" />
                            <form action="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="firstName" id="firstName" class="form-control" tabindex="1" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email ID</label>
                                            <input type="text" name="emailID" id="emailID" class="form-control" tabindex="3" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" tabindex="5" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lastName" id="lastName" class="form-control" tabindex="2" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contact Number</label>
                                            <input type="text" name="contactNumber" id="contactNumber" class="form-control" tabindex="4" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" tabindex="6" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <button class="btn btn-submit btn-block validate-signup g-recaptcha"
                                    data-sitekey="6LdjcmoUAAAAALdSA-F4j7N56XnpWpg0lM-MCZel"
                                    data-size="invisible">Sign Up</button>
                            </div>
                            <div class="form-group">
                            <span>Note: Password should contain
                                <ul>
                                    <li>At least one lowercase char</li>
                                    <li>At least one uppercase char</li>
                                    <li>At least one digit</li>
                                    <li>At least one special sign of @#-_$%^&+=§!?</li>
                                    <li>At least 8 characters and maximum 20</li>
                                </ul>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>