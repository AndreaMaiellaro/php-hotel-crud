<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "hotel";
    $port = "8889";
    
    // Connect
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Check connection
    if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        die();
    }

    $sql = "SELECT `room_number`, floor FROM `stanze`;";
    $result = $conn->query($sql);

    $rooms = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // var_dump($row);
            // echo "Stanza N. ". $row['room_number']. " piano: ". $row['floor']. " beds: ". $row['beds'] . "<br>";
            $rooms[] = $row;
        }
    }

    // var_dump($rooms);

    $conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista stanza</title>
</head>
<body>
    
    <h1>Lista Stanze</h1>

    <ul>
        <?php foreach($rooms as $room) { ?>
            <li>
                Numero Stanza: <?php echo $room['room_number']; ?><br>
                Piano: <?php echo $room['floor']; ?><br>
                <a href="#">Vedi dettagli stanza</a>
            </li>
        <?php } ?> 
    </ul>

</body>
</html>