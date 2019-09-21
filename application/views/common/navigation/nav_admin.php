<li class="nav-item">
  <a href="<?php echo base_url('Admin/'); ?>" class="nav-link <?= nav_setting('dashboard', $nav_active); ?>">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?php echo base_url('Admin/Kegiatan'); ?>" class="nav-link <?= nav_setting('kegiatan', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Kegiatan</p>
  </a>
</li>
<li class="nav-item has-treeview <?=nav_setting('data_master', $nav_open, 'open')?>">
  <a href="<?php echo base_url(); ?>assets/theme/#" class="nav-link">
    <i class="nav-icon fas fa-circle"></i>
    <p>
      Data Master
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo base_url('Admin/Mahasiswa'); ?>" class="nav-link <?= nav_setting('mahasiswa', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Mahasiswa</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('Admin/Dosen'); ?>" class="nav-link <?= nav_setting('dosen', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Dosen</p>
      </a>
    </li>
  </ul>
</li>
