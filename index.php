<?php
$host = "lempdb.cd48wqmg2qf7.ap-south-1.rds.amazonaws.com";
$user = "admin";
$password = "YOUR_PASSWORD";
$dbname = "lempdb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// INSERT DATA
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO users (name) VALUES ('$name')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>LEMP App</title>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #78A2D2, #FEFFAF);
    margin: 0;
    padding: 0;
}

.container {
    width: 60%;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

input {
    padding: 10px;
    width: 60%;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-right: 10px;
}

button {
    padding: 10px 20px;
    background: #78A2D2;
    border: none;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    background: #5a87c5;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background: #78A2D2;
    color: white;
}

tr:hover {
    background: #f5f5f5;
}
</style>

</head>
<body>

<div class="container">
    <h2>✨ LEMP User Management</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <button type="submit">Add User</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM users");

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                  </tr>";
        }

        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
