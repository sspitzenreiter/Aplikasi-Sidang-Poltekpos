<li class="nav-item">
  <a href="<?php echo base_url('admin/'); ?>" class="nav-link <?= nav_setting('dashboard', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item has-treeview <?=nav_setting('menu', $nav_open, 'open')?>">
  <a href="<?php echo base_url(); ?>assets/theme/#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Menu
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo base_url('admin/kegiatan'); ?>" class="nav-link <?= nav_setting('kegiatan', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Kegiatan</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('admin/dosen'); ?>" class="nav-link <?= nav_setting('dosen', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Dosen</p>
      </a>
    </li>
  </ul>
</li>
