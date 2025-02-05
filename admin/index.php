<?php
include "./config.php";

// Handle AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $id = $_POST["id"];
    $status = $_POST["status"];
    $message = $_POST["message"];

    $sql = "UPDATE registrations SET status=?, massage=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $status, $message, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
    $stmt->close();
    exit;
}

// Fetch all users
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
        }

        .edit-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
    </style>

    <script>
        function openModal(userId, currentStatus, currentMessage) {
            $("#userId").val(userId);
            $("#statusSelect").val(currentStatus);
            $("#messageInput").val(currentMessage);
            $("#statusModal").modal("show");
        }

        function updateStatus() {
            let userId = $("#userId").val();
            let status = $("#statusSelect").val();
            let message = $("#messageInput").val();

            if (status === "block" && message.trim() === "") {
                alert("Please enter a message when blocking.");
                return;
            }

            $.post("", {
                update_status: 1,
                id: userId,
                status: status,
                message: message
            }, function(response) {
                let result = JSON.parse(response);
                if (result.success) {
                    alert("Status updated successfully!");
                    location.reload();
                } else {
                    alert("Error updating status.");
                }
            });
        }
    </script>
</head>

<body>

    <h2>Registered Users</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Cast</th>
            <th>Looking For</th>
            <th>City</th>
            <th>Height</th>
            <th>Education</th>
            <th>Description</th>
            <th>Status</th>
            <th>Message</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["dob"] . "</td>";
                echo "<td>" . $row["caste"] . "</td>";
                echo "<td>" . $row["looking_for"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["height"] . "</td>";
                echo "<td>" . $row["education"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td id='status_" . $row["id"] . "'>" . $row["status"] . "</td>";

                // Display Image (backdirectory: "../uploads/")
                $imagePath = "../register/" . $row["image"];
                echo "<td><img src='$imagePath' alt='User Image'></td>";
                echo "<td id='message_" . $row["id"] . "'>" . $row["massage"] . "</td>";
                echo "<td><button class='edit-btn' onclick='openModal(" . $row["id"] . ", \"" . $row["status"] . "\", \"" . $row["massage"] . "\")'>Edit Status</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <!-- Status Edit Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Edit Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="userId">
                    <div class="mb-3">
                        <label for="statusSelect" class="form-label">Status</label>
                        <select id="statusSelect" class="form-control">
                            <option value="open">Open</option>
                            <option value="block">Block</option>
                            <option value="warning">Warning</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="messageInput" class="form-label">Message</label>
                        <textarea id="messageInput" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateStatus()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>