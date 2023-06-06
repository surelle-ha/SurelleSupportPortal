<?php 
    if(array_key_exists('announcement_send', $_POST)) {
        $id = 'ELLE'.rand(1000,9999).'N'.rand(10000,99999).'ANN';
        $message = $_POST['announcement_send'];
        $timedate = date('Y-m-d H:i:s'); // Use the current date and time
        if (preg_match("/['\"]/", $message)) {
            // Escape quotes and single quotes
            $message = str_replace("'", "\'", $message);
            $message = str_replace('"', '\"', $message);
        }
        $sql = "INSERT INTO announcements_tb VALUES('$id', '".$_POST['subject']."', '".$message."', '".$_SESSION['fname'].' '.$_SESSION['lname']."', '".$timedate."', '[]');";
        if ($conn->query($sql) === TRUE) {
            // Return a success response
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            // Return an error response
            $response = array('success' => false);
            echo json_encode($response);
        }
    }

    if(isset($_POST['announcement_delete'])){
        $sql = "DELETE FROM announcements_tb WHERE id = '".$_POST['announcement_delete']."'";
        $conn->query($sql);
    }

    if(array_key_exists('announcement_acknowledge', $_POST)){
        // Fetch the current JSON array from the database
        $sql = "SELECT acknowledgeby FROM announcements_tb WHERE id = '".$_POST['announcement_acknowledge']."';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $jsonArray = json_decode($row['acknowledgeby'], true);

        // Add $_SESSION['id'] to the PHP array
        array_push($jsonArray, $_SESSION['id']);

        // Convert the updated PHP array into a JSON array string
        $jsonArrayString = json_encode($jsonArray);

        // Update the row in the database with the new JSON array string
        $sql = "UPDATE announcements_tb SET acknowledgeby = '$jsonArrayString' WHERE id = '".$_POST['announcement_acknowledge']."'";
        $conn->query($sql);
    }
?>