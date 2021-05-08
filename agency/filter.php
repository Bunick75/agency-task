<!-- pagination is not performed in filtering -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style type="text/css">
	  #pagination{
		display: none;
	}
</style>

<?php
require('config.php');

 if(isset($_POST["lang"]))  // data recieved from the ajax request
 {  

      if($_POST["lang"] != '')  // f language is selected then select the movies with that language
      {  
           $q = "SELECT * FROM movie_details WHERE language = '".$_POST["lang"]."'";  
      }  
      else  
      {  
           $q = "SELECT * FROM movie_details";  // if all/nothing is selected every movie reardless of the language will be displayed
      } 
 } 
 ?>

<body>

 <table class="table table-hover" id="show_movies">
    <thead>
      <tr>
        <th>Movie Name</th>
        <th>Movie Poster</th> 
      </tr>
    </thead>
    <tbody >
     <?php

      	// once we get the query for filtering then execute the query here
      	$results = ($conn->query($q));
     
		//fetching all the data from above result and storing in array "$row"
		while ($row = mysqli_fetch_assoc($results)) { ?>
	      <tr>
	      	<td><b>Name :</b> &nbsp<?php echo $row['movie_name']; ?> <br>
	      		<b>Language :</b> &nbsp<?php echo $row['language']; ?> <br>
	      		<b>Release Date :</b> &nbsp<?php echo $row['release_date'];?> <br>
	      		<b>Duration :</b> &nbsp<?php echo $row['movie_length']; ?> min <br>
	      	</td>
	        <td><img src="<?php echo $row['movie_poster'];?>" style="width: 150px;height: 150px"></td>
	        
	      </tr>
      <?php } ?>
      
    </tbody>
  </table>

</body>
</html>