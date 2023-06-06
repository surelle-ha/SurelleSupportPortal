<?php
if (isset($_POST['productSubmit'])) {
    $id = 'ELLE'.rand(1000, 9999).'N'.rand(10000, 99999).'PROD';
    $message = $_POST['instructions'];
    $timedate = date('Y-m-d H:i:s'); 
    
    // Sanitize the message to prevent SQL injection
    $message = str_replace("'", "\'", $message);
    $message = str_replace('"', '\"', $message);
    
    $targetDir = 'internal_storage/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Generate a unique filename
    $newFileName = $targetDir . $id . '.' . $fileExtension;
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $newFileName)) {
        // Connect to your database (assuming you have a variable named $conn)
        
        // Prepare the SQL statement (consider using prepared statements for security)
        $sql = "INSERT INTO products_tb VALUES ('$id', '".$_POST['title']."', '".$_POST['subject']."', '$message', '".$_POST['author']."', '".$_POST['tags']."', '".$_POST['current_version']."', '".$_POST['date_added']."', '".$_POST['status']."')";
        
        if ($conn->query($sql) === TRUE) {
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            $response = array('success' => false);
            echo json_encode($response);
        }
    } else {
        echo '<script>alert("Failed to upload the file.");</script>';
    }
}

if(isset($_POST['deleteProduct'])) {
    $sql = "DELETE FROM products_tb WHERE id = '".$_POST['product']."';";
    if ($conn->query($sql) === TRUE) {
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        $response = array('success' => false);
        echo json_encode($response);
    }
}
?>
