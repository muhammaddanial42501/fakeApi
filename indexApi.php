<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="indexApi.php">Products</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="indexApi.php">Home</a>
          </li>
          <li class="nav-item">
            <a type="button" class="btn btn-primary nav-link active" href="create.php">Add New</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>

<?php
include('connection.php'); // Include your database connection script

// API URL
$api_url = "https://fakestoreapi.com/products";

// Fetch data from the API
$api_data = file_get_contents($api_url);
$products = json_decode($api_data, true);

foreach ($products as $product) {
    $id = (int) $product['id'];
    $title = mysqli_real_escape_string($conn, $product['title']);
    $price = (float) $product['price'];
    $description = mysqli_real_escape_string($conn, $product['description']);
    $category = mysqli_real_escape_string($conn, $product['category']);
    $image_url = mysqli_real_escape_string($conn, $product['image']);

    $sql = "SELECT * FROM fakeapii WHERE id = '$id'";
    $result = $conn->query($sql);

    // Insert data into the "fakeapi" table
    $sql = "INSERT INTO fakeapii (title, price, description, category, image_url)
            VALUES ('$title', $price, '$description', '$category', '$image_url')";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . mysqli_error($conn) . "\n";
    }
}

$sql = "SELECT * FROM fakeapii ";
$result = $conn->query($sql);

echo '<html><head><style>';

echo 'table { border-collapse: collapse; width: 100%; }';
echo 'th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }';
echo 'th { background-color: #f2f2f2; }';
echo '</style></head><body>';

if ($result->num_rows > 0) {

    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Title</th>';
    echo '<th>Price</th>';
    echo '<th>Description</th>';
    echo '<th>Category</th>';
    echo '<th>Image</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
    echo '</tr>';

  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo '<tr>';
    echo '<td>' . $row["id"] . '</td>';
    echo '<td>' . $row["title"] . '</td>';
    echo '<td>' . $row["price"] . '</td>';
    echo '<td>' . $row["description"] . '</td>';
    echo '<td>' . $row["category"] . '</td>';
    echo '<td><img src="' . $row["image_url"] . '" width="100"></td>';
    echo "<td><a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a></td>";
    echo "<td><a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a></td>";
    echo '</tr>';
    

  }
  echo "</table>";
} else {
  echo "0 results";
}




// Close the database connection
mysqli_close($conn);
?>
