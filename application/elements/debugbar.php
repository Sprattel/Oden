<style>
#oden-debug-bar {
  position: fixed;
  top: 0px;
  left: 0px;
  background-color: #d3d3d3;
}
#oden-debug-bar ul {
  margin: 0px;
  padding: 0px;
}
#oden-debug-bar ul li a {
  color: black;  
  margin: 0px 10px;
  text-decoration: none;
}
#oden-debug-bar ul li {
  list-style: none;
  float: left;
}
.oden-debug-details {
  position: absolute;
  top: 30px;
  left: 0px;
  background-color: #d3d3d3;
}
</style>
<script src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script>
$(function(){
  $("#oden-debug-bar-files, #oden-debug-bar-vars").hide();
  $("#db-files").click(function(){
    $("#oden-debug-bar-files").show(333);
  });
  $("#db-vars").click(function(){
    $("#oden-debug-bar-vars").show(333);
  });
});
</script>
<div id="oden-debug-bar">
<ul>
  <li><a id="db-files" href="#">Files</a></li>
  <li><a id="db-vars" href="#">Vars</a></li>
  <li><a id="db-db" href="#">DB</a></li>
  <li><a id="db-logs" href="#">Logs</a></li>
  <li><a id="db-ajax" href="#">Ajax</a></li>
</ul>
</div>
<div class="oden-debug-details">
  <div id="oden-debug-bar-files">
    <h3>Loaded files</h3>
    <?

foreach ($debugFiles as $file):

?>
    <?=

  $file

?><br />
    <?

endforeach;

?>
  </div>
  
  <div id="oden-debug-bar-vars">
    <h3>POST</h3>
    <pre><?

var_dump($_POST)

?></pre>
    
    <h3>GET</h3>
    <pre><?

var_dump($_GET)

?></pre>
    
    <h3>SESSION</h3>
    <pre><?

var_dump($_SESSION)

?></pre>
    
    <h3>COOKIE</h3>
    <pre><?

var_dump($_COOKIE)

?></pre>
    
    <h3>SERVER</h3>
    <pre><?

var_dump($_SERVER)

?></pre>
       
    <h3>FILES</h3>
    <pre><?

var_dump($_FILES)

?></pre>
    
    <h3>REQUEST</h3>
    <pre><?

var_dump($_REQUEST)

?></pre>
        
  </div>
  
</div>