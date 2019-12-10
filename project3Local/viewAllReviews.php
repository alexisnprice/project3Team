<<<<<<< HEAD
<?php 
if (!isset($_SESSION['id'])) {
        header("Location:signup.php");
} else
include 'header.php';
=======
<?php include 'header.php' ?>
<link type="text/css" rel="stylesheet" href="styles/style.css" media="screen">
<link rel="stylesheet" href="theme/vendor/bootstrap/css/bootstrap-grid.css">
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Viewing All Previous Reviews</h1>
        </div>
      </div>
    </div>
  </header>


<?php
>>>>>>> fbec53b0fcc3b746a1b99b738f45436acdb6e258
//read pets file
function readReviews() {
    // read the file into memory; if there is an error then stop processing
    $arr = file("data/reviews.txt") or die('ERROR: Cannot find file');
    // our data is comma-delimited
    $delimiter = ','; 
    // loop through each line of the file
    foreach ($arr as $line) {  
       // explode returns an array of strings where each element in the array
       // corresponds to each substring between the delimiters
       $splitcontents = explode($delimiter, $line);       
       $review = array();
       $review['name'] = $splitcontents[0];
       $review['type'] = $splitcontents[1];
       $review['rate'] = $splitcontents[2];
       $review['comment'] = $splitcontents[3];
       
       // add pet to array of pets
       //when you add an element to an array in php, if you don't
       //give it an index or key, it just adds it to the end
       $reviews[$review['name']] = $review;
    }
    return $reviews;
 }
?>
<head><meta charset='utf-8'></head>
<link rel ="stylesheet">
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<<<<<<< HEAD
<table class="mdl-data-table  mdl-shadow--2dp">
=======
<table class="mdl-data-table  mdl-shadow--2dp" class="table">
>>>>>>> fbec53b0fcc3b746a1b99b738f45436acdb6e258
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Rating</th>
        <th>Comment</th>
    </tr>
    </thead>
    <tbody>
    <?php  
        $reviews = readReviews();
        foreach ($reviews as $review) {
            echo '<tr>';
            echo '<td>' . $review['name'] .    '</td>';
            echo '<td>' . $review['type'] .  '</td>';
            $x = 0;
            echo '<td>';
            while($x < $review['rate']) {
                echo '<i class="em em-star" aria-role="presentation" aria-label="WHITE MEDIUM STAR"></i>';
                $x++;
            }
            echo '</td>';
            echo '<td>' . $review['comment'] .  '</td>';
            echo '</tr>    ';    
        } 
<<<<<<< HEAD
    ?>            
=======
    ?>          
>>>>>>> fbec53b0fcc3b746a1b99b738f45436acdb6e258
    </tbody>
    </table>