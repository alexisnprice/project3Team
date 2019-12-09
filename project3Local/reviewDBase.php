<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["restaurant_name"];
    $type = $_POST["restaurant_type"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

    $file = "data/reviews.txt";
    if(!is_file($file)) {
        file_put_contents($file,"");
    }

    $current = file_get_contents($file);
    $current .= "$name, $type,$target_file\n";
    file_put_contents($file,$current);
?>
    <main id="main">
    <table>
        <tr>
            <td>Restaurant Name</td>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><?php echo $type; ?></td>
        </tr>
        <tr>
            <td>Image</td>
            <td style="height:200px;width:100px;"><?php echo "<img style='height: 100%; width:100%;"?> </td>
        </tr>
    </table>


<?php
}
?>
