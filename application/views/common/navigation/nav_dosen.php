<li class="nav-item">
  <a href="<?php echo base_url('dosen/'); ?>" class="nav-link <?= nav_setting('dashboard', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?php echo base_url('dosen/profil'); ?>" class="nav-link <?= nav_setting('profil', $nav_active); ?>">
    <i class="far fa-circle nav-icon"></i>
    <p>Profil</p>
  </a>
</li>
<li class="nav-item has-treeview <?= nav_setting('menu', $nav_open, 'open'); ?>">
  <a href="" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Menu
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo base_url('dosen/bimbingan'); ?>" class="nav-link <?= nav_setting('bimbingan', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Bimbingan</p>
      </a>
    </li>
    <li class="nav-item has-treeview" >
      <a href="" class="nav-link" >
        <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Penilaian
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
   <ul class="nav nav-treeview">
    <li>
      <a href="<?php echo base_url('dosen/nilai_pembimbing'); ?>" class="nav-link <?= nav_setting('nilai_pembimbing', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Penilaian Pembimbing</p>
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('dosen/nilai_penguji'); ?>" class="nav-link <?= nav_setting('nilai_penguji', $nav_active); ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Penilaian Penguji</p>
      </a>
    </li>
    </ul>
    </li>
  </ul>
</li>
