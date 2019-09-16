<li class="nav-item">
  <a href="<?php echo base_url('Mahasiswa/'); ?>" class="nav-link <?= nav_setting('dashboard', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard</p>
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
      <a href="<?php echo base_url('Mahasiswa/Detail'); ?>" class="nav-link <?= nav_setting('detail_kegiatan', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Detail Kegiatan</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('Mahasiswa/bimbingan'); ?>" class="nav-link <?= nav_setting('bimbingan', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Bimbingan</p>
      </a>
    </li>
  </ul>
</li>
