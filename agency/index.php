<!-- sorry for untidiness and last minute submission
 
 	And pagination is apllied to every part excluding when we do the filtering process
 -->


<?php 
  require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>

<div class="container">
<br><br>
 <!-- ###################  SORTING STARTS ########################################### -->   
  <h2>Sort</h2>
  <form method="POST" action="#"> 
	  <input type="submit" name="all" value="all"> 
	  <input type="submit" name="r_date" value="r_date"> 
	  <input type="submit" name="length" value="length">              
	</form> 
  <!-- ==================== get the query on what we need to perform sorting on ======================= -->
	<?php 
		if (isset($_POST['r_date'])) {
			$q = "SELECT * FROM `movie_details` ORDER BY release_date desc"; // display recent data first
		}
		elseif (isset($_POST['length'])) {
			$q = "SELECT * FROM `movie_details` ORDER BY movie_length desc"; // display recent data first
		}
		else{
			$q = "SELECT * FROM `movie_details`"; //display all data 
		}			
	?>
	<!-- ============================================================= -->


<br><br>
	
<!-- ############################## for filtering on language ######################################### -->
<!-- displaying all the disting languages fromt the databade to filter -->
<!-- once user choooses a language an ajax call get triggerd which redirects the folw of control to filter.php for processing -->
	<?php 
	$languageQ = "SELECT DISTINCT language from movie_details";
	$results = ($conn->query($languageQ)); ?>

	<h2>Filter</h2>
	 <label for="Sort">language:</label>
     <select name="lang" id="lang">  
        <option value="">All</option>  
        <?php while ($row = mysqli_fetch_assoc($results)) {
			$language = $row['language'];
		?>
        <option value="<?php echo $language;?>"><?php echo $language;?></option>
       <?php } ?>   
    </select> 



  <table class="table table-hover" id="show_movies">
    <thead>
      <tr>
        <th>Movie Name</th>
        <th>Movie Poster</th> 
      </tr>
    </thead>
    <tbody> 
	<?php 	  
	    if(isset($_GET['page'])){  //getting the page number when clicked on pagination numbers
	   		$page = $_GET['page'];
		}else
		{
		  $page = 1;  //if not clicked then pages 1 is taken as default
		}
		
		$start_from = ($page-1)*1;
		$result = mysqli_query($conn,$q); //once we get the query on what we need to perform sorting on we execute the below script
		$count = mysqli_num_rows($result); // get the number of rows of the the query output
		$per_page = 4; //display only two records per page
		$no_of_pages = ceil($count/$per_page); //calculating number of pages required to display the movies 
		$start = ($page-1)*$per_page;
		$sql = " $q LIMIT $start,$per_page"; //query to display the movie details

      	
      	// once we get the query for sorting then execute the query here
      	$results = ($conn->query($sql));
     
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
  
  		<!-- displayinfg number of pages required "pagination" -->
  	   <div id="pagination"> 
	    <ul>
	    <?php 
	    for($i=1;$i<=$no_of_pages;$i++)
	    { ?>
	       <li style="list-style-type: none; display: inline; padding: 20px;">
	       		<a href="a.php?page=<?php echo $i;?>"><?php echo $i;?></a>
	       	</li>
	     <?php } ?> 
	    </ul>
   	   </div>


</div>

<!-- ajax to redirect to next pagae for filtering -->
<script>  
 $(document).ready(function(){  
      $('#lang').change(function(){  //onchanging the value in the dropdown
           var lang = $(this).val(); // it will take the value of it 
           $.ajax({  
                url:"filter.php", //goes to this url
                method:"POST",  // with post request
                data:{lang:lang},  // along with lang data
                success:function(data){  //on successfully performing the desired action
                     $('#show_movies').html(data);  //displays the dataa in the table whose id is show_movies 
                }  
           });  
      });  
 });   
 </script>  

</body>
</html>
