<?php 
  
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo "<div class='container'>".$m."</div>"."<br>";
  	endforeach;

  endif;

?>