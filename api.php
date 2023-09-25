<?php
include ('conn.php');

$api_url= "https://fakestoreapi.com/products";

$api_data= file_get_contents($api_url);
$products= json_decode($api_data,true);

foreach ($products as $product){

    $title=mysqli_real_escape_string($conn,$product['title']);
    $price=(float)$product['price'];
    $description=mysqli_real_escape_string($conn,$product['description']);
    $category=mysqli_real_escape_string($conn,$product['category']);
    $image=mysqli_real_escape_string($conn,$product['image']);

    $sql= "INSERT INTO fakeapi (title,price,description,category,image_url) VALUES ('$title',$price,'$description','$category','$image_url')";

if (mysqli_query($conn,$sql)){
    echo "Insert Successfully";
}else{
    echo "Error" . mysqli_error($conn) . '\n';
}

}

mysqli_close($conn);

?>