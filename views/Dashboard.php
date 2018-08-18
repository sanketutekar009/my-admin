<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- Custom JS -->
    <script src="/assets/js/dashboard.js"></script>
</head>
<body>
    <div class="main-container">
        <!-- Header section starts -->
            <?php require_once("./views/Header.php"); ?>
        <!-- Header section ends -->
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 table-responsive p-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email ID</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Email ID</label>
                            <input type="text" name="emailID" id="emailID" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" name="contactNumber" id="contactNumber" class="form-control" />
                        </div>
                    </form>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="hidden" name="userID" id="userID" value="" />
                    <button type="button" class="btn btn-success update-user">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
         </div>
    </div>
</body>
</html>