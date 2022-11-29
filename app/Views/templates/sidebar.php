<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion shadow" id="accordionSidebar" style="background-color: #508b90;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="peserta">
        <div class="sidebar-brand-icon rotate-n-15">
            <img style="width:50px" src="/assets/img/logobps.png" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-1">PKL BPS KOTA MALANG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/peserta') ?>">
            <i class="fa fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kehadiran
    </div>

    <!-- Nav Item - absensi Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/peserta/data/absen') ?>">
            <i class="fa fa-edit"></i>
            <span>Absensi</span>
        </a>
    </li>

    <!-- Nav Item - Laporan aktivitas harian Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/peserta/data/aktivitas/'.session()->get('id')) ?>">

            <i class="fa fa-folder-open"></i>
            <span>Laporan Aktivitas Harian</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>

    <!-- Nav Item - Profil Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('dashboard/peserta/profile/'.session()->get('id')) ?>">
            <i class="fa fa-user"></i>
            <span>Profil</span>
        </a>
    </li>
    <!-- Nav Item - absensi Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/peserta/ajukan') ?>">
            <i class="fa fa-edit"></i>
            <span>Ajukan Pendaftaran PKL</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (!session()->log) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('login'); ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> Login
            </a>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> Keluar
            </a>
        </li>
    <?php endif ?>

</ul>
<!-- End of Sidebar -->