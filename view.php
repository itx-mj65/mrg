<?php 
include "./admin/config.php";

$id=$_GET["id"];

$sql = "SELECT * FROM registrations WHERE id=$id";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>

                <?php echo $row["name"]; ?>
      
    
</body>
</html>