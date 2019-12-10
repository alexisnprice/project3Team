<?php 
if (!isset($_SESSION['id'])) {
        header("Location:signup.php");
} else
include 'header.php';
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
<table class="mdl-data-table  mdl-shadow--2dp">
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
    ?>            
    </tbody>
    </table>