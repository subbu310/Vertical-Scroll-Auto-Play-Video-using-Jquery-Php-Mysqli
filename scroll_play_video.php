<!DOCTYPE html>
<html>
<head>

<title>Auto Play video</title>
 
<meta charset="utf-8">
  
<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <!----add jquery link----> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
<style>
*{
	
	margin:0;
	padding:0;
	box-sizing:border-box;
}
.container{
	
	width:100%;
	height:100%;
}
.container-heading{
	
	width:100%;
	height:100px;
	position:fixed;
	top:0;
	background-color:#ccc;
	text-align:center;
	z-index:1;
}
h2{
	
	font-size:30px;
	color:blue;
	line-height:100px;
}
.video-container{
	
	width:100%;
	max-width:500px;
	margin:auto;
	height:400px;
	margin-top:120px;
	z-index:0;
}
.video-thumb{
	
	width:500px;
	height:400px;
	margin-bottom:20px;
}
.video-thumb img{
	
	width:100%;
	height:100%;
	display:block;
}
.video-thumb video{
	
	width:100%;
	height:100%;
	object-fit:fill;
	display:none;
}
</style>

</head>

<body>
  
  <div class="container">
      
	   <div class="container-heading">
	   
	    <h2>Vertical Scroll Auto Play Video using Jquery Php Mysqli</h2>
        
		 
       </div>
	   
	   <div class="video-container">
	     
		     
		  
       </div>
	   
  </div>
   
<script>

 $(document).ready(function(){
	 
	 fetch_videos();
	 
	 function fetch_videos()
	 
	 {
		 
		 var action = "fetchVideos";
		
        $.ajax({
			
			url: "scroll_play_action.php",
			
			method:"post",
			
			data:{action:action},
			
			success: function(data){
				
				$('.video-container').html(data);
			}
		});		
		 
	 }
	 
	$(window).scroll(function(){

          var images = document.getElementsByClassName("image");
		  
		  var videos = document.getElementsByClassName("video");
		  
		  var fraction = 0.9 ;
		  	
		  for(var i=0; i< videos.length, images.length ; i++){
			  
			 var video = videos[i];
			 
			 var image = images[i];
			 
			 var x = video.offsetLeft||image.offsetLeft, 
			 
			     w = video.offsetWidth||image.offsetWidth, 
				 
				 y = video.offsetTop||image.offsetTop,

                 h = video.offsetHeight||image.offsetHeight, 
				 
				 r = x + w, // right side

				 b = y + h; // bottom
			 
			  var visibleX = Math.max(0, Math.min(w, window.pageXOffset + window.innerWidth - x, r - window.pageXOffset));
			 
			  var visibleY = Math.max(0, Math.min(h, window.pageYOffset + window.innerHeight - y, b - window.pageYOffset));
			 
			 // video frame visible 100% convert to fraction
			 
			   var  visible = visibleX * visibleY /(w * h);
			 
			    if(visible > fraction){
					
					video.play();
					
					image.style.display = "none";
					
					video.style.display = "block";
					
				}else{
					
					video.pause();
					
					image.style.display = "block";
					
					video.style.display = "none";
				}
				 
		  }
		  
	 });
	 
 });

 
</script>

</body>
</html>