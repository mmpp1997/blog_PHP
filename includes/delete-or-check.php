<?php
include 'config/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["postId"];
    $btn = $_POST["btn"];

    try {
        
        if ($btn == "Delete") {

            $sql = "DELETE FROM todos WHERE `todos`.`id` = $id";

        } elseif ($btn == "Done") {

            $checked = $_POST["checked"];
            $set_to=!$checked;

            $sql = "UPDATE `todos` SET `checked` = '$set_to' WHERE `todos`.`id` = $id";

        }

        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: ../homepage.php");
        exit();

    } 
    catch (mysqli_sql_exception) {

        echo "<script>
                alert('Something went wrong'); 
                window.location.href='../homepage.php';
                </script>";
        exit();
        
    }
}
