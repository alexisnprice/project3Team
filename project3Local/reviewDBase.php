<?php include 'header.php';
//equiv to processing page
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["restaurant_name"];
    $type = $_POST["restaurant_type"];
    $rate = $_POST["restaurant_rating"];
    $comment = $_POST["restaurant_comment"];
    $target_dir = "imgs/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);

    $file = "data/reviews.txt";
    if(!is_file($file)) {
        file_put_contents($file,"");
    }

    $current = file_get_contents($file);
    $current .= "$name, $type,$rate,$comment,$target_file\n";
    file_put_contents($file,$current);
?>
    <main id="main">
        <p>Review submitted successfully!</p>
</main>


<?php
}
?>
