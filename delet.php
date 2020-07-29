<?php
include 'dbcon.php';

$id = $_GET['ids'];

$deletequery = "delete from  registration where id=$id";

$query = mysqli_query($con, $deletequery);


if($query){
    echo "Deleted Successful";
    ?>
    <script>
        location.replace("home.php");
    </script>

    <?php
}
else
    echo "Not Delet";

?>