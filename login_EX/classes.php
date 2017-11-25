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
        <script src="css/Bootstrap/js/jquery-3.2.1.min.js"></script>
        <script src="css/Bootstrap/js/bootstrap.min.js"></script>
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


            <?php
                if($_SESSION['authlevel'] == 1){ 
                    $query = "SELECT DISTINCT district FROM classes";
                    $result = mysqli_query($connection, $query);
    
                    if ($result->num_rows > 0) {

                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $district = $row ['district'];

                        ?>
                         <div class="row">
                            <div class="col-lg-3 bg-primary text-center">
                            <h1><?php echo  $district ?></h1>
                            <ul class="text-justify">
                            <?php 
                                $sub_query = "SELECT class_location FROM classes WHERE district like '%".$district."%' ";
                                $sub_result = mysqli_query($connection, $sub_query);
                                if ($sub_result->num_rows > 0) {
                                        while($row = $sub_result->fetch_assoc()) {
                                            $class = $row ['class_location'];
                                            ?>
                                            <li><a href="#"><?php echo $class ?></a></li>
                                            <?php
                                        }
                                }
                            ?>
                            </ul>
                        </div>
                        
                        <div class="col-lg-1"></div>
                        <?php
    
                        }
                    }
                    

                }else{
                    $loc = $_SESSION['location'];
                    $query = "SELECT * FROM classes WHERE district like '%".$loc."%' ";
                    $result = mysqli_query($connection, $query);

                    if($result){
                    
                        if ($result->num_rows > 0) {
                        // output data of each row
            ?>
                    <div class="row">
                        <div class="col-lg-3 bg-primary text-center">
                        <h1><?php echo $loc ?></h1>
                        <ul class="text-justify">
                        <?php 
                                while($row = $result->fetch_assoc()) {
                                        $class = $row ['class_location'];
                                        ?>
                                        <li><a href="#"><?php echo $class ?></a></li>
                                        <?php
                                }
                        ?>
                            
                        </ul>
                    </div>
                    
                    <div class="col-lg-1"></div>
            <?php
                        
                    } else {
                        echo "0 results";
                    }

                    }

    

                }

            ?>

            <!-- <div class="row">
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
            </div> -->
        </div>
    </body>
</html>
<?php
    }
    mysqli_close($connection);
?>