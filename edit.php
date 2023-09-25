<?php
  include "connection.php";
//   $id="";
//   $title="";
//   $price="";
//   $description="";
//   $category="";

//   $error="";
//   $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:Api/indexApi.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from fakeapii where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: Api/indexApi.php");
      exit;
    }
    $title=$row["title"];
    $price=$row["price"];
    $description=$row["description"];
    $category=$row["category"];

  }
  else{
    $id = $_POST["id"];
    $title=$_POST["title"];
    $price=$_POST["price"];
    $description=$_POST["description"];
    $category=$_POST["category"];

    $sql = "update fakeapii set title='$title', price='$price', description='$description',category='$category' where id='$id'";
    $result = $conn->query($sql);
    
  }
  
?>
<!DOCTYPE html>
<html>
<head>
 <title>Edit</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="indexApi.php"> Product</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="indexApi.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Product </h1>
 </div><br>

 <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

 <label> Title: </label>
 <input type="text" name="title" value="<?php echo $title; ?>" class="form-control"> <br>

 <label> Price: </label>
 <input type="text" name="price" value="<?php echo $price; ?>" class="form-control"> <br>

 <label> Description: </label>
 <input type="description" name="description" value="<?php echo $description; ?>" class="form-control"> <br>

 <label> Category: </label>
 <input type="category" name="category" value="<?php echo $category; ?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="indexApi.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>