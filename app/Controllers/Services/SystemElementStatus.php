<?php 
    function getSystemElementStatus($conn, $elementName){
        $stmt = $conn->prepare("SELECT status FROM system_tb WHERE element = ?");
        $stmt->bind_param("s", $elementName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $status = $row["status"];
                if($status == 1){
                    return true;
                }else{
                    return false;
                }
            }
        } else {
            return false;
        }
        $stmt->close();
    }
?>