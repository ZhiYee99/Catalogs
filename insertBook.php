<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $localhost = 'localhost';
    $isbn = 'isbn';
    $database = 'publications';
    $username = 'root';
    $password = '';


    // TODO 2: Check and filter data coming from the user.
    if(isset($isbn)){
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $title = $_POST['title'];
        $price = $_POST['price'];
    }else{
        echo "Not found.";
    }


    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli($localhost,$database,$isbn,$password);
    if($conn->connect_error){
        die("Connection fail!");
    }


    // TODO 4: Query the database.
    //$query = "INSERT INTO catalogs VALUES('$isbn', ......)"
    $query = "INSERT INTO catalogs VALUE('$isbn','$author','$title','$price')"
    $result = $conn->query($query);

    // TODO 5: Display the feedback back to user.
    //book found/!found
    if(!$result){
        die("Fail to create");
    }else{
        echo"Successfully created.<br>"
        echo "<a href = search.html><button>search<button></a>";

    }


    // TODO 6: Disconnecting from the database.
    $conn->close;

    ?>
</body>
</html> 