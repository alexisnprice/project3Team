<!-- <?php include 'header.php';?> -->
<form method="post" enctype="multipart/form-data" action="reviewDBase.php">
<head>
        <link type="text/css" rel="stylesheet" href="styles/style.css" media="screen">
    <meta charset="utf-8">
</head>
<h3>Submit a review!</h3>
<p>Restaurant Name<br>
<input type="text" name="restaurant_name">
</p>
<p>Food Type<br>
<select name="restaurant_type">
    <option>Choose type</option>
    <option>Fast Food/Delivery $</option>
    <option>Fast-Casual $$</option>
    <option>Sit-Down $$$</option>
    <option>Elegant $$$$</option>
</select></p>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<p>
<div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
</div>
<div>
<p>Upload Image<br>
<input type="file" name="fileToUpload">
</div>

<input type="submit">
</form>
</body>
</html>