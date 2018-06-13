<?php
$servername = "localhost";
$username = "rzheng";
$password = "***********"; //encryption needed please delete password after use

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>mysqli Connected successfully</p>";




//display original data
echo "<br>******Display original user list.******";
$sql = "SELECT `ID`, `firstname`, `lastname` FROM `rzheng`.`user`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["ID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}




//Test insert user
$sql = "INSERT INTO `rzheng`.`user`(`firstname`, `lastname`, `ID`, `password`)
VALUES ('test', 'ce', '5', 'abc')";

if ($conn->query($sql) === TRUE) {
    echo "<br>******New user created successfully.******";
} else {
    echo "Error: " . $sql . "<br>The test data added already<br>" . $conn->error;
}

//display results
$sql = "SELECT `ID`, `firstname`, `lastname` FROM `rzheng`.`user`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["ID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}





//Test update user
$query="UPDATE `rzheng`.`user` SET `firstname`='test2',`lastname`='ce2',`password`='test' WHERE `ID`=5";

if ($conn->query($query) === TRUE) {
    echo "<br>******New user updated successfully.******";
} else {
    echo "<br><br>Error: " . $query . "" . $conn->error;
}

//display results
$sql = "SELECT `ID`, `firstname`, `lastname` FROM `rzheng`.`user`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["ID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}







//Test delete user
$query="DELETE FROM `rzheng`.`user` WHERE `firstname`='test2'";

if ($conn->query($query) === TRUE) {
    echo "<br>******The new user is deleted.******";
} else {
    echo "<br><br>Error: " . $query . "" . $conn->error;
}

//display results
$sql = "SELECT `ID`, `firstname`, `lastname` FROM `rzheng`.`user`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>id: " . $row["ID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}



$conn->close();
?>
