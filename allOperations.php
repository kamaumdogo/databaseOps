<?php

    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "aa";

    $link = mysqli_connect($server,$username,$pass,$db);
    $conn = mysqli_select_db($link,$db);

    if ($conn) {
        echo "Connection Success.";
    } else {
        die('Connection Error : '.mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database Operations trials</title>
</head>
<body>
    <form action="" method="post" name="form1">
        <table>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="username" placeholder="Enter Your Name" value=""></td>
            </tr>
            <tr>
                <td>City : </td>
                <td><input type="text" name="city" placeholder="Enter Your City" value=""></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="email" name="email" placeholder="Enter Your Email" value=""></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input type="submit" name="submit1" value="Insert">
                <input type="submit" name="submit2" value="Delete">
                <input type="submit" name="submit3" value="Update">
                <input type="submit" name="submit4" value="Dispaly">
                <input type="submit" name="submit5" value="Search">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
    if (isset($_POST["submit1"])) {
        mysqli_query($link, "insert into clients (username, city, email) values('$_POST[username]','$_POST[city]','$_POST[email]')");
        echo "Record Inserted Successfully.";
       
        //echo "Record Inserted Successfully.";
        /*if (mysqli_query_error()){
            echo "Sorry. An Error was encountered!";
        }  else{
            echo "Record Inserted Successfully.";
        } */         
    } if (isset($_POST["submit2"])) {
        mysqli_query($link, "DELETE FROM clients WHERE username = '$_POST[username]'");
        echo "Record Deleted Successfully.";
    } if (isset($_POST["submit3"])) {
        mysqli_query($link, "UPDATE clients SET city = '$_POST[city]', email = '$_POST[email]' WHERE username = '$_POST[username]'");
        echo "Record Updated Successfully.";
    } if (isset($_POST["submit4"])) {
        $res = mysqli_query($link, "SELECT * FROM clients");
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>"; echo "Name"; echo "</th>";
        echo "<th>"; echo "City"; echo "</th>";
        echo "<th>"; echo "Email"; echo "</th>";
        echo "</tr>";
        while($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row["username"]; echo "</td>";
            echo "<td>"; echo $row["city"]; echo "</td>";
            echo "<td>"; echo $row["email"]; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } if (isset($_POST["submit5"])) {
        $res = mysqli_query($link, "SELECT * FROM clients WHERE username = '$_POST[username]' or city = '$_POST[city]' or email = '$_POST[email]'");
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>"; echo "Name"; echo "</th>";
        echo "<th>"; echo "City"; echo "</th>";
        echo "<th>"; echo "Email"; echo "</th>";
        echo "</tr>";
        while($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>"; echo $row["username"]; echo "</td>";
            echo "<td>"; echo $row["city"]; echo "</td>";
            echo "<td>"; echo $row["email"]; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>