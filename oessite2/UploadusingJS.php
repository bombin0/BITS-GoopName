
<!DOCTYPE html>

<html>


<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Image Upload</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
    crossorigin="anonymous" />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style type="text/css">
   #content{
   	width: 75%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
 
  
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }

    .navbar-brand img {
    width: 150px;
   	height: 70px;
   }


/* Images */
   .userBG
    {
      position: relative;
      top: 0;
      left: 100;
   width: 400px;
   height: 300px;
    }
    #model
    {
      position: relative;
      top: -80px;
      left: +50px;
      width: 100px;
   height: 75px;
    
      
    }

    
    footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: lightgrey;
   text-align: center;
}

h1{
  margin: 50px ;
  border-bottom: 3px solid black;
}

#clickme{
  margin-top: 5px;
  border: double 3px
}

</style>

<script>
  $("#clickme").click(function () {
      $("#finalImg").toggle();
  });
</script>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-light static-top" style="background-color: #D8DBE2;">
    <div class="container">
    <a class="navbar-brand" href="#">
          <img src="OES.png" alt="">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link">Home</a>
                <a href="#" class="nav-item nav-link">Products</a>
                <a href="#" class="nav-item nav-link">Account</a>
                
            </div>
            <h1>Upload and Overlay function</h1>
        </div>
    </div>
</nav>




<body>
 





<!-- Found a method of displaying an image from a file on the page. https://stackoverflow.com/questions/12368910/html-display-image-after-selecting-filename   -->


<div class="container p-3 my-3" >
  <div id="content" class= "p-5 my-3">

<input type='file' onchange="readURL(this);" />


<script>     function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#userImage')
              .attr('src', e.target.result)
              .width(400)
              .height(300);
      };

      reader.readAsDataURL(input.files[0]);
  }
}</script>

<div class="row">
  
  <div class="col border">
    
    
    <div>Hi, to use the image overlay function correctly please upload an image that fites the requirements, otherwise it won't look right!</div>
  <div class = "mt-2">-Please stand rougly one metter back from your desired location</div>
  <div class = "mt-2">-Position your your camera straight on with your desired location when you take the image. (At a flat angle)</div>
    
  </div>

  
  <div class="col border">
    
  

    <div class = "container.fluid"> 
      <div id="imageHolder" class= "p-3 "  >
        <img id="userImage" src="#" alt="your image" />
        <!-- This will be a php varible which takes the correct model to display and puts it on the page. -->
        <!-- Right now its not set to an image, just one hard coded that was on my laptop -->
        <img id = "model" src="#" alt="Model of product" visabiliy="hidden">

  </div>
</div>

</div>
</div>
<div id="clickme">    Merge Images    </div>
</body>

<br><br>


<?php
  require "footer.php";
?>
</html>

