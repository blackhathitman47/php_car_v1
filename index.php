<!doctype html>
<html>
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>voiture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://mdbootstrap.com/previews/docs/latest/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://mdbootstrap.com/previews/docs/latest/css/mdb.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <?php
    include("config.php");
    include("Helper.php");
    if(isset($_POST['but_upload'])){
        $car_name = $_POST['car_name'];
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Insert record
            $query = "insert into add_car(name,image) values('".$car_name."','".$name."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }
    
    }
    $car=get_all("add_car");
    ?>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark default-color-dark fixed-top">
    <a class="navbar-brand" href="index.html">Web</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="3">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Fotos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Peliculas</a>
            </li>
        </ul>
    </div>
</nav>
</header>

<div class="py-5" ></div>
<div class="container-fluid">
    <div class="row">
    <div class=" panel panel-primary" style="margin-left: 15px;width: 366px;">
    <div class="panel-heading">
        <h3 class="panel-title">nouvelle voiture</h3>
        </div>
        <div class="panel-body" style="overflow: hidden;">
            <form class="py-1" method="post" action="" enctype='multipart/form-data'>
                <input class="py-1" type='file' name='file' />
                <input class="py-1" type='text' name='car_name' />
                <input class="py-1" type='submit' value='Save name' name='but_upload'>
            </form>
        </div>
    </div>
        <div class=" col-sm-9 col-xs-9 px-2">
            <ul class="list-group">
                <li class="list-group-item active">voiture</li>
            </ul>
            <?php foreach ($car as $c): ?>
            <div class="col-sm-2">
                <div class="" style="background-image: url(upload/<?php echo $c['image']; ?>) !important;background-size: cover !important;height: 150px;" >
                    <span style="color: wheat;margin: 5px;"><?php echo $c['name']; ?></span>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<hr>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/bootstrap.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/mdb.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/jarallax.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/jarallax-video.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        new WOW().init();
    </script> 


</body>
</html>
