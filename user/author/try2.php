</!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="card-body">
            <div class="row">
              <div class="col-md-1"> 
                <div id="lineno" style="max-height:1024px; overflow: hidden; align-items: center;">

                  <?php 
                    for ($x = 0; $x <= 9999; $x++) {
                        echo "<button class='btn btn-warning'>$x</button> <br>";
                    } 
                  ?>  
                </div>        
            
                
              </div>
              <div class="col-md-11"> 
<iframe  style="float:left;" src = "../../demodoc.pdf" width='1024' height='768'' allowfullscreen webkitallowfullscreen></iframe>
              </div>
            </div>
          </div>

</body>
</html>
<script>
var isSyncingLeftScroll = false;
var isSyncingRightScroll = false;
var leftDiv = document.getElementById('lineno');
var rightDiv = document.getElementById('docuview');

leftDiv.onscroll = function() {
  if (!isSyncingLeftScroll) {
    isSyncingRightScroll = true;
    rightDiv.scrollTop = this.scrollTop;
  }
  isSyncingLeftScroll = false;
}

rightDiv.onscroll = function() {
  if (!isSyncingRightScroll) {
    isSyncingLeftScroll = true;
    leftDiv.scrollTop = this.scrollTop;
  }
  isSyncingRightScroll = false;
}
</script>