<div id="tranding">
	<?php
    	print '<div class="group">' ; 
		for($i=1; $i<= count($rows) ; $i++) :
		 print $rows[$i-1] ; 
		 if($i < count($rows)) :
			 if($i%3==0) :
			  print '</div><div class="group">' ;
			 endif;
		 else :
		 	 print "</div>";
		 endif;
		endfor;
	?>
</div>