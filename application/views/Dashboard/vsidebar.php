<!-- BEGIN PAGE -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="sidebar">
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav inverse">
        <?php
          foreach ($menu as $key) {
            if ($key['visible'] == '1'){
             echo "<li class='start active'>";
             echo "<a href='".base_url().''.$key['link']."'>";
             echo "<span class='fawsm hidden-xs' style='font-family:FontAwesome'>".$key['icon']."</span>";
             echo "<span class='title'>".ucwords(strtolower($key['menu']))."</span>";
             echo "</a>";
             echo "</li>";
            }
          }
        ?>
      </ul>
    </div>
  </div>   
  <!-- END OF SIDEBAR -->
