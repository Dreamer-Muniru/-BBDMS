<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<style>
  
  .about_us img{
    width: 100%;
    height: 120px;
  }

  .about_us img{
    margin-top: 100px;
  }
  .doner_corner{
    width:140px;
    height: 40px;
    justify-content: center;
    background-color: #7FB3D5;
    padding: 5px;
    border-radius: 10px;
    }
    .doner_corner a{
      text-decoration: none;
      color: #000;
      font-weight: bold;
      padding: 5px;
      text-align: center;
      font-size: 18px;
    }
    .doner_corner:hover{
      background-color: grey;
    }
    .doner_corner a:{
      font-size: 20px;
      color: #fff;
    }
  }


</style>
<body>


<?php 
$active ='about';
include('head.php');

?>


<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
    <div class="doner_corner">
      <a href="doner_corner.php">Doner Corner</a>
    </div>
    <!-- <div class="banner_img">
      <img src="image/banner15.jpeg" alt="banner image">
    </div> -->
  <div id="content-wrap" style="padding-bottom:50px;">
    

<div class="row">
    <div class="col-lg-6">
        <h1 class="mt-4 mb-3">About Us</h1>
        <p> <?php
          include 'conn.php';
          $sql=$sql= "select * from pages where page_type='aboutus'";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0)   {
              while($row = mysqli_fetch_assoc($result)) {
                echo $row['page_data'];
              }
            }

         ?>
      </p>

    </div>
    <div class="col-lg-6 about_us">
        <img class="img-fluid rounded" src="image\banner15.jpeg" style="height:250px" alt="error"  >
    </div>
</div>
</div></div>

<?php include('footer.php')
?>
</div>
</body>

</html>
