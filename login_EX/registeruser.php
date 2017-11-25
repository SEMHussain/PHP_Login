<!DOCTYPE html>
<?php
    session_start();
    include 'inc/db.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testing</title>
        <link href="css/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="css/Bootstrap/js/jquery-3.2.1.min.js"></script>
        <script src="css/Bootstrap/js/bootstrap.min.js"></script>
        <style>
            body
            {
                margin-top: 200px;
                margin-left: 330px;
            }
        </style>
        <script>
            $(function(){
                //Listen for a click on any of the dropdown items
                $(".type li").click(function(){
                    //Get the value
                    var value = $(this).attr("value");
                    //Put the retrieved value into the hidden input
                    $("input[name='type']").val(value);
                });
            });
        </script> 
    </head>
    <body>
        <div class="container">
        <div class="container">
        <div class="col-lg-6">
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="col-lg-3 control-label">First Name : </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="fname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last Name : </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="lname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email : </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password : </label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Authentication Type : </label>
                    <div class="col-lg-6">
                    <input type='hidden' name='type'>
                        <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">
                        Authentication Level
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu type" name="type">
                            <li value="1"><a href="#">Admin</a></li>
                            <li value="2"><a href="#">Teacher</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">District : </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="district">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">
                        <input type="submit" name="submit" class="form-control btn-success" value="Register" required="">
                    </div>
                </div>
            </form>
        </div>
            <?php
                if(isset($_POST['submit']))
                {
                    $first_name = $_POST['fname'];
                    $last_name = $_POST['lname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $authlevel = $_POST['type'];
                    $location = $_POST['district'];
                    
                    $query = "INSERT INTO user(first_name,last_name,email,password,location,authlevel) VALUES('$first_name','$last_name','$email','$password','$location','$authlevel')";
                    if (mysqli_query($connection, $query)=== TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $query . "<br>" . $connection->error;
                    }
                }
            ?>
        </div>
    </body>
</html>