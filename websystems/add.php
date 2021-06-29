<?php

    include_once("connection/connections.php");
    $con = connection();

    if(isset($_POST['submit'])){

        $pet_name = $_POST['name'];
        $color = $_POST['color'];
        $gender = $_POST['gender'];
        $purpose = $_POST['purpose'];
        $address = $_POST['address'];

        $sql = "INSERT INTO `pet_info` (`pet_name`, `color`, `gender`, `purpose`, `address`)
         VALUES ('$pet_name','$color','$gender','$purpose','$address')";
         $con->query($sql) or die ($con->error);

         header("Location: search.php");

    }

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="search.css">
        <title>ADD</title>
    </head>
    <body>

    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    
    }

body{
    background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/bg3.png);
    background-size: cover;
}

.app-container {
    position: absolute;
    top: 25%;
    left: 30%;
    display: block;
    width: 40%;
    
}

.app-container label {
    font-size: 18px;
    font-weight: 800;
    color: white;
}

.app-container .back{
    margin-bottom: 1rem;
    text-decoration: none;
    font-size: 22px;
}

.app-container .back a{
    text-decoration: none;
    color: black;
    font-weight: 700;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.app-container h1{
    margin-top: 1rem;
    margin-bottom: 1rem;
    font-size: 32px;
    text-align: center;
}

.app-container h2{
    margin-bottom: 1rem;
    font-size: 27px;
}

.app-container input[type="text"],
.app-container input[type="email"] {
    width: 100%;
    font-size: 22px;
    padding: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
    color: gray;
    margin-bottom: 5px;
}

.app-container-purpose{
    width: 100%;
    font-size: 22px;
    padding: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
    color: gray;
    margin-bottom: 5px;
}

.app-container-gender{
    width: 100%;
    font-size: 22px;
    padding: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
    color: gray;
    margin-bottom: 5px;
}

#gender{
    width: 100%;
    font-size: 22px;
    padding: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
    color: gray;
    margin-bottom: 5px;
}

.app-container input[type="submit"] {
    width: 100%;
    letter-spacing: 3px;
    border-radius: 8px;
    font-size: 18px;
    padding: 1rem;
    font-family: Georgia, 'Times New Roman', Times, serif;
    background-color: #a50000;
    color: white;
    cursor: pointer;
    text-decoration: none;
    border: none;
    margin-bottom: 1rem;
    font-weight: 800;
}

.app-container input[type="submit"]:hover{
    background-color: #c01414;
}

.application-container input[type="submit"]:hover {
    background-color: rgb(240, 150, 226);
    transition: 0.2s;

    
}
    </style>
        
         <div class = "hero-button">
                <a href="search.php"><img src="images/logo1.png" style = "width:150px;" alt=""></a> <br>
         </div>

        <div class="app-container">
            <form action="" method="post">

                <label>Pet Name: </label>
                <input type="text" name = "name" id="name">

                <label>Pet Color: </label>
                <input type="text" name = "color" id = "color">

                <label>Pet Gender: </label>
                <select name="gender" id="gender">
                    <option> --Gender-- </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            <div class = "app-container-purpose"> 
                <label>Purpose: </label>
                <input type="text" name = "purpose" id = "purpose">
            </div>
                <label>Address: </label>
                <input type="text" name = "address" id = "address">

                <input type="submit" name = "submit" value="Add Pet">
            </form>
        </div>
    </body>
    </html>