<?php
include 'home.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document data </title>
  <style>
    table {
  width: 80%;
  border-collapse: collapse;
  margin-top: 20px;
}

th, td {

  border: 1px solid ;
  padding: 8px;
  text-align: left;
}

th {
  background-color: green;
  color: white;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #f1f1f1;
}

  </style>
</head>
<body>
<h2>Data Peserta Didik</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Emailaddress</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
            <?php
        // $result = $conn->query("SELECT * FROM users");
        
        if (!$result) {
            die("Query gagal: " . $conn->error);
        }
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['emailaddress']}</td>
                    <td>{$row['password']}</td>
                 
                  </tr>";
        }
        ?>
            </tbody>
        </table>
</body>
</html>