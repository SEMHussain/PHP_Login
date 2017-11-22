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
        <style>
            body
            {
                margin-top: 200px;
                margin-left: 330px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-6">
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">User Name : </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password : </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="pw">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3">
                            <input type="submit" name="submit" class="form-control btn-success" value="Login"required="">
                        </div>
                    </div>
                </form>
            </div>
            <?php
                if(isset($_POST['submit']))
                {
                    $em = $_POST['email'];
                    $pw = $_POST['pw'];
                    
                    $query = "SELECT * FROM user WHERE email = '$em' AND password = '$pw' ";
                    $result = mysqli_query($connection, $query);
                    if($result)
                    {
                        if(mysqli_num_rows($result) == 1)
                        {
                            $record = mysqli_fetch_assoc($result);
                            $_SESSION['id'] = $record['id'];
                            $_SESSION['first_name'] = $record['first_name'];
                            $_SESSION['last_name'] = $record['last_name'];
                            
                            $query_u = "UPDATE user SET last_login = NOW() WHERE id = {$_SESSION['id']}";
                            $result_u = mysqli_query($connection, $query_u);
                            header('location:classes.php');
                        }
                        else 
                        {
                            echo '<script>alert("Invalid Username / Password");</script>';
                        }
                    }
                    else
                    {
                        echo mysqli_error($connection);
                        echo '<script>alert("Invalid Connection");</script>';
                    }
                }
            ?>
        </div>
    </body>
</html>
<?php
    mysqli_close($connection);
?>