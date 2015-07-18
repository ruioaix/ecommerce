<!-- TOP FILTER -->
<div class="top-filter clearfix">

  <div class="pull-left">

    <!-- VIEW -->
    <div class="view  pull-left">
      <a href="<?php print base_path().str_replace('list', 'grid', current_path()); ?>" class="view-grid <?php if (strpos(current_path(),'grid') !== false) print "active"; ?>">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
          <path d="M8,8H0V0h8V8z M1,7h6V1H1V7z"/>
          <path d="M19,8h-8V0h8V8z M12,7h6V1h-6V7z"/>
          <path d="M8,19H0v-8h8V19z M1,18h6v-6H1V18z"/>
          <path d="M19,19h-8v-8h8V19z M12,18h6v-6h-6V18z"/>
        </svg>
      </a>
      <a href="<?php print base_path().str_replace('grid', 'list', current_path()); ?>" class="view-list <?php if (strpos(current_path(),'list') !== false) print "active"; ?>">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="18px" height="19px" viewBox="0 0 18 19" enable-background="new 0 0 18 19" xml:space="preserve">
          <path d="M8,8H0V0h8V8z M1,7h6V1H1V7z"/>
          <rect x="10" width="8" height="1"/>
          <rect x="10" y="3" width="8" height="1"/>
          <rect x="10" y="6" width="6" height="1"/>
          <path d="M8,19H0v-8h8V19z M1,18h6v-6H1V18z"/>
          <rect x="10" y="11" width="8" height="1"/>
          <rect x="10" y="14" width="8" height="1"/>
          <rect x="10" y="17" width="6" height="1"/>
        </svg>
      </a>
    </div>
    <!-- END VIEW -->

  </div>

  <div class="pull-right">
    <!-- SORT BY -->
    <div class="sort filter-select pull-left">
      <label for="sort">
        Sort by:
        <?php if (!empty($form['sort_by']['#options'])) : ?>
          <select id="sort">
            <?php foreach ($form['sort_by']['#options'] as $key => $value): ?>
              <?php if (isset($GET['sort_by']) && $GET['sort_by'] == $key) : ?>
                <option value="<?php print $key; ?>" selected="true"><?php print $value; ?></option>
              <?php else : ?>
                <option value="<?php print $key; ?>"><?php print $value; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        <?php endif; ?>
      </label>
      <label for="order" class="js-hide">
        <?php if (!empty($form['sort_order']['#options'])) : ?>
          <select id="order">
            <?php foreach ($form['sort_order']['#options'] as $key => $value): ?>
              <?php if (isset($GET['sort_order']) && $GET['sort_order'] == $key) : ?>
                <option value="<?php print $key; ?>" selected="true"><?php print $value; ?></option>
              <?php else : ?>
                <option value="<?php print $key; ?>"><?php print $value; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        <?php endif; ?>
      </label>
      <div class="pull-right properties-ordering-select">
        <?php if (isset($GET['sort_order']) && $GET['sort_order'] == 'DESC') : ?>
          <a class="selected-desc" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="List"><i class="fa fa-sort-desc"></i></a>
        <?php else : ?>
          <a class="selected-asc" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="List"><i class="fa fa-sort-asc"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <!-- END SORT BY -->

    <!-- SHOW PAGE -->
    <div class="show-page filter-select pull-left">
      <label for="show-page">
        Show:
        <?php if (!empty($form['items_per_page']['#options'])) : ?>
          <select id="show-page">
            <?php foreach ($form['items_per_page']['#options'] as $key => $value): ?>
              <?php if (isset($GET['items_per_page']) && $GET['items_per_page'] == $key) : ?>
                <option value="<?php print $key; ?>" selected="true"><?php print $value; ?></option>
              <?php else : ?>
                <option value="<?php print $key; ?>"><?php print $value; ?></option>
              <?php endif; ?>

            <?php endforeach; ?>
          </select>
        <?php endif; ?>
      </label>
    </div>
    <!-- END SHOW PAGE -->

    <!-- PAGING -->
    <ul class="paging-p  _1 pull-left">
    </ul>
    <!-- END PAGING -->
  </div>

</div>
<!-- END TOP FILTER -->