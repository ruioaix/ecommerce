<?php
	print '<div class="row">' ; 
	for($i=1; $i<= count($rows) ; $i++) :
	 print $rows[$i-1] ; 
	 if($i%3==0) :
	  print '</div><div class="row">' ;
	 endif;
	endfor;
	print "</div>";
?>