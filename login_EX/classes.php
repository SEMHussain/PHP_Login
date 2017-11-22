<!DOCTYPE html>
<?php
    session_start();
    include 'inc/db.php';
    if(!isset($_SESSION['id']))
    {
        header('location:index.php');
    }
    else
    {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            a{color: white;}
            p{float: right}
        </style>
    </head>
    <body>
        
        <div class="container">
            <div class="jumbotron">
                <h1>Classes</h1>
                <b>Welcome : <code><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></code></b>
                <p><a href="logout.php" class="btn btn-danger">Log Out</a></p>
            </div>
            <div class="row">
                <div class="col-lg-3 bg-primary text-center">
                <h1>Colombo</h1>
                <ul class="text-justify">
                    <li><a href="#">Dematagoda</a></li>
                    <li><a href="#">Maligawaththa</a></li>
                    <li><a href="#">Maradana</a></li>
                    <li><a href="#">Borella</a></li>
                    <li><a href="#">Wellawaththa</a></li>
                </ul>
            </div>
            
            <div class="col-lg-1"></div>
            
            <div class="col-lg-3 bg-primary text-center">
                <h1>Gampaha</h1>
                <ul class="text-justify">
                    <li><a href="#">City Name 1</a></li>
                    <li><a href="#">City Name 2</a></li>
                </ul>
            </div>
            
            <div class="col-lg-1"></div>
            
            <div class="col-lg-3 bg-primary text-center">
                <h1>Kaluthara</h1>
                <ul class="text-justify">
                    <li><a href="#">Area Name 1</a></li>
                    <li><a href="#">Area Name 2</a></li>
                    <li><a href="#">Area Name 3</a></li>
                    <li><a href="#">Area Name 4</a></li>
                </ul>
            </div>
            </div>
            <br><br>

            <div class="row">
               
                <div class="col-lg-3 bg-primary text-center">
                    <h1>Kandy</h1>
                    <ul class="text-justify">
                        <li><a href="#">Area Name 1</a></li>
                        <li><a href="#">Area Name 2</a></li>
                        <li><a href="#">Area Name 3</a></li>
                        <li><a href="#">Area Name 4</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-1"></div>
                
                <div class="col-lg-3 bg-primary text-center">
                    <h1>Kurunagala</h1>
                    <ul class="text-justify">
                        <li><a href="#">Area Name 1</a></li>
                        <li><a href="#">Area Name 2</a></li>
                        <li><a href="#">Area Name 3</a></li>
                        <li><a href="#">Area Name 4</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-1"></div>
                
                <div class="col-lg-3 bg-primary text-center">
                    <h1>Matale</h1>
                    <ul class="text-justify">
                        <li><a href="#">Area Name 1</a></li>
                        <li><a href="#">Area Name 2</a></li>
                        <li><a href="#">Area Name 3</a></li>
                        <li><a href="#">Area Name 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    }
    mysqli_close($connection);
?>