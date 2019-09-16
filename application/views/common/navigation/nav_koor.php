<li class="nav-item">
  <a href="<?php echo base_url('koordinator/'); ?>" class="nav-link <?= nav_setting('dashboard', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Approval Proposal</p>
  </a>
</li>
<li class="nav-item has-treeview <?= nav_setting('menu', $nav_open, 'open'); ?>">
  <a href="<?php echo base_url(); ?>assets/theme/#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Menu
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo base_url('koordinator/approve'); ?>" class="nav-link <?= nav_setting('approval_proposal', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Approval Proposal</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('koordinator/jadwal'); ?>" class="nav-link <?= nav_setting('penjadwalan', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Penjadwalan</p>
      </a>
    </li>
  </ul>
</li>
