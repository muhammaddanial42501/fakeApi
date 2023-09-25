<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $sql = "INSERT INTO fakeapii (title, price, description, category)
        VALUES ('$title', $price, '$description', '$category')";

    $query = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="indexApi.php">Add New Product</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="indexApi.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-6 m-auto">

        <form method="post">

            <br><br>
            <div class="card">

                <div class="card-header bg-primary">
                    <h1 class="text-white text-center"> New Product </h1>
                </div>

                <label> Title: </label>
                <input type="text" name="title" class="form-control"> 

                <label> Price: </label>
                <input type="text" name="price" class="form-control"> 

                <label> Description: </label>
                <input type="text" name="description" class="form-control"> 

                <label> Category: </label>
                <input type="text" name="category" class="form-control"> 

                <!-- <label> Image: </label> -->
                

                <button class="btn btn-success" type="submit" name="submit" > Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

            </div>
        </form>
    </div>
</body>

</html>