<li class="nav-item">
  <a href="<?php echo base_url('Mahasiswa/'); ?>" class="nav-link <?= nav_setting('dashboard', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item has-treeview <?= nav_setting('kegiatan', $nav_open, 'open'); ?>">
  <a href="" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Kegiatan
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo base_url('Mahasiswa/Proyek'); ?>" class="nav-link <?= nav_setting('proyek', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Proyek</p>
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
