<style>
  li.active {
    border-bottom: solid 5px red;
  }

</style>

<!-- TOP FILTER -->
<div class="top-filter text-center clearfix">

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

  <div class="group pull-left">

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

    <!-- FILTER -->
    <div class="filter  pull-left" id="filter-grid">
      <label class="filter-head"><?php print t('Filter by'); ?></label>
    </div>
    <!-- END FILTER -->

  </div>

  <div class="pull-right">

    <!-- SHOW PAGE -->
    <div class="show-page filter-select pull-left">
      <label for="show-page">
        <?php print t('Show'); ?>:
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

  <!-- FILTER CONTENT -->
  <div class="filter-cn  text-left" id="filter-cn-grid">
    <div class="row">
      <!--By Categories-->
      <div class="col-xs-6 col-lg-3">
        <h2 class="filter-title"><?php print t('By Categories'); ?></h2>
        <ul class="filter-cat nav-cat">
          <?php foreach ($categories as $id => $category): ?>
            <li>
              <div class="check-box">
                <?php if ($category['checked']) : ?>
                  <input type="checkbox" class="checkbox" id="size-<?php print $id; ?>" value="<?php print $id; ?>" checked="true">
                <?php else: ?>
                  <input type="checkbox" class="checkbox" id="size-<?php print $id; ?>" value="<?php print $id; ?>">
                <?php endif; ?>
                <label for="size-<?php print $id; ?>"><?php print $category['name']; ?> <span>(<?php print $category['count']; ?>)</span></label>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <!--End By Categories-->

      <!--By Prices-->
      <div class="col-xs-6 col-lg-3">
        <h2 class="filter-title"><?php print t('By Prices'); ?></h2>
        <div class="sidebar-slider ">
          <div class="slider">
            <div id="slider"></div>
            <div class="slider-g">
              <span class="price-value" id="price-f"></span>
              <span class="price-value" id="price-t"></span>
              <button class="btn-filter"><?php print t('Filter'); ?></button>
            </div>
          </div>
        </div>
      </div>
      <!--End By Prices-->

      <div class="visible-xs visible-sm visible-md clear"></div>
      <!--By Color-->
      <?php if (!empty($colors)) : ?>
        <div class="col-xs-6 col-lg-3">
          <h2 class="filter-title"><?php print t('By Color'); ?></h2>
          <div class="sidebar-color">
            <ul class="nav-color">
              <?php foreach ($colors as $id => $color): ?>
                <?php if ($color['checked']) : ?>
                  <li class="active"><a  href="#" style="background-color: <?php print $color['rgb']; ?>" data-color="<?php print $id; ?>"></a></li>
                  <input type="checkbox" class="checkbox js-hide" id="color-<?php print $id; ?>" value="<?php print $id; ?>" checked="true">
                <?php else: ?>
                  <li><a  href="#" style="background-color: <?php print $color['rgb']; ?>" data-color="<?php print $id; ?>"></a></li>
                  <input type="checkbox" class="checkbox js-hide" id="color-<?php print $id; ?>" value="<?php print $id; ?>">
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endif; ?>
      <!--End By Color-->

      <!--By Size-->
      <?php if (!empty($sizes)) : ?>
        <div class="col-xs-6 col-lg-3">
          <h2 class="filter-title"><?php print t('By Size'); ?></h2>
          <ul class="filter-sizes nav-cat">
            <?php foreach ($sizes as $id => $size): ?>
              <li>
                <div class="check-box">
                  <?php if ($size['checked']) : ?>
                    <input type="checkbox" class="checkbox" id="size-<?php print $id; ?>" value="<?php print $id; ?>" checked="true">
                  <?php else: ?>
                    <input type="checkbox" class="checkbox" id="size-<?php print $id; ?>" value="<?php print $id; ?>">
                  <?php endif; ?>
                  <label for="size-<?php print $id; ?>"><?php print $size['name']; ?> <span>(<?php print $size['count']; ?>)</span></label>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
      <!--End By Size-->
    </div>
  </div>
  <!-- END FILTER CONTENT -->

</div>
<!-- END TOP FILTER -->