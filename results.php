<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $localhost = 'localhost';
    $isbn = 'isbn';
    $database = 'publications';
    $username = 'root';
    $password = '';

    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['submit'])){
        $type = $_POST['type'];
        $term = $_POST['term'];
        
    }else{
        echo "Not found.";
    }

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli($localhost,$username,$password,$database);
    if($conn->connect_error){
        die("Connection fail!");
    }


    // TODO 4: Query the database.
    $query = "SELECT * FROM catalogs WHERE $type LIKE '%$term%'";

    // TODO 5: Retrieve the results.
    $result = $conn ->query($query);
    if(!$result){
        die("Fail to search.");
    }else{
        echo"Here's your results.";        
    }
    $row = $result -> num_rows;

    // TODO 6: Display the results back to user.
    echo "<table style='border: 1px solid black'>
        <tr>
            <th>ISBN</th>
            <th>Author</th>
            <th>Title</th>
            <th>Price</th>
        </tr>";

    for($m=0; $m<$rows; $m++){
        $row = $result->fetch_array(MYSQLI_NUM);
        echo "<tr>";
            for($n=0; $n<4; $n++){
                echo "<td>" . htmlspecialchars($row[$n]) . "</td>";

            }
        echo "</tr>";
    }
    echo "</table>";

    // TODO 7: Disconnecting from the database.
    $result->close();
    $conn->close();

    ?>
</body>
</html> 