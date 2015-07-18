<div class="view-filters">
  <?php print $exposed; ?>
</div>
<?php if ($rows): ?>
  <?php print $rows; ?>
<?php elseif ($empty): ?>
  <div class="view-empty">
    <?php print $empty; ?>
  </div>
<?php endif; ?>
<div class="bottom-list clearfix">
    <div class="pull-left">
        <p class="text-page">
             <?php
			  global $pager_page_array, $pager_total, $pager_limits;
			  $from = ($view->query->pager->current_page * $view->query->pager->options['items_per_page']) + 1;
			  $to = $from + count($view->result) - 1;
			  $total = $view->total_rows;
			  if($total > 0){
				  if ($total <= $to) {
					print t('Showing').': '.$from.' - '.$total.' of '.$view->total_rows;
				  }
				  else
				  {
					print t('Showing').': '.$from.' - '.$to.' of '.$view->total_rows;
				  }
			  }
			 ?>
        </p>
    </div>
    <div class="pull-right">
        <!-- PAGING -->
        <?php if ($pager): ?>
		  <?php print str_replace('class="pager"', 'class="paging-p  _1 pull-left"', $pager); ?>
        <?php endif; ?>
        <!-- END PAGING -->
    </div>
</div>