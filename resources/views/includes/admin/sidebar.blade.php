<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-text mx-3">
      MI AL-HUDA Admin
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{url('/admin/transaksi')}}">
      <i class="fas fa-fw fa-coins"></i>
      <span>Transkasi</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('user.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Data User</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('kelas.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Data Kelas</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('siswa.index') }}">
    <i class="fas fa-fw fa-id-badge"></i>
      <span>Data Siswa</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('tarifspp.index') }}">
    <i class="fas fa-fw fa-id-badge"></i>
      <span>Tarif SPP</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/admin/laporan')}}">
    <i class="fas fa-fw fa-id-badge"></i>
      <span>Laporan</span></a>
  </li>

  <hr class="sidebar-divider">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
