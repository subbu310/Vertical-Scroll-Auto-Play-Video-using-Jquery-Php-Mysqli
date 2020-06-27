
<?php
  
  error_reporting(0);
  
  include('scroll_database.php');
  
  if(isset($_POST['action'])){
	  
	  
	  $sql ="SELECT * FROM `videos` ORDER BY `id` DESC";
	  
	  $result = mysqli_query($conn, $sql);
	  
	  while($row = mysqli_fetch_assoc($result)){
		  
		  $video = $row['video_url'];
		  
		  $thumb = $row['thumbnail'];
		  
		  if($thumb == null){
			  
			  $thumbnail = '<img src="icon/post_image.png" />';
			  
		  }else{
			  
			   $thumbnail = '<img class="image" src="'.$thumb.'" />';
			 
		  }
		  
		  echo '<div class="video-thumb">
	   
	            '.$thumbnail.'
				
		        <video class="video" src="'.$video.'" controls/>
			
	   
			 </div>';
		  
	  }
	  
  }
 
 ?>
 
 
 
 
 
 