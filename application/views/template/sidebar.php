        <style type="text/css">
            
       </style>
       <!-- Sidebar -->
       <ul class="navbar-nav warnaSidebar sidebar sidebar-dark accordion" id="accordionSidebar">


        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="<?=base_url('admin') ?>">
            <div class="sidebar-brand-icon">
                <img style="width: 50px" src="<?=base_url('assets/img/ico.png') ?>">
            </div>
            <img style="width: 150px" src="<?=base_url('assets/img/dekemaskeun.png') ?>" class="sidebar-brand-text mx-1">
        </a>


        <!-- Nav Item - Dashboard -->
        <li <?php if ($title == "Dashboard") echo "class = 'nav-item active'";?> 
        class="nav-item">

        <a class="nav-link pb-0" href="<?=base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider mt-3">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <li <?php if ($title == "User Management") echo "class = 'nav-item active'";?> 
        class="nav-item">
        <a class="nav-link pb-0" href="<?=base_url('admin/user_management') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User Management</span>
        </a>
    </li>

    <li <?php if ($title == "Edit Profile") echo "class = 'nav-item active'";?> 
    class="nav-item">
    <a class="nav-link pb-0" href="<?=base_url('admin/edit_profile') ?>">
        <i class="fas fa-fw fa-user-edit"></i>
        <span>Edit Profile</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider mt-3">

<!-- Heading -->
<div class="sidebar-heading">
    CONTENT
</div>

<li <?php if ($title == "Kategori") echo "class = 'nav-item active'";?> 
    class="nav-item">
    <a class="nav-link pb-0" href="<?=base_url('content/kategori') ?>">
        <i class="fas fa-fw fa-plus"></i>
        <span>Kategori</span>
    </a>
</li>

<li <?php if ($title == "Katalog") echo "class = 'nav-item active'";?> 
    class="nav-item">
    <a class="nav-link pb-0" href="<?=base_url('content/katalog') ?>">
        <i class="fas fa-fw fa-plus"></i>
        <span>Katalog</span>
    </a>
</li>

<li <?php if ($title == "Pengumuman") echo "class = 'nav-item active'";?> 
    class="nav-item">
    <a class="nav-link pb-0" href="<?=base_url('content/pengumuman') ?>">
        <i class="fas fa-fw fa-bullhorn"></i>
        <span>Pengumuman</span>
    </a>
</li>

<li <?php if ($title == "Testimoni") echo "class = 'nav-item active'";?> 
    class="nav-item">
    <a class="nav-link pb-0" href="<?=base_url('content/testimoni') ?>">
        <i class="fas fa-fw fa-comments "></i>
        <span>Testimoni</span>
    </a>
</li>

<li <?php if ($title == "Kontak") echo "class = 'nav-item active'";?> 
    class="nav-item">
    <a class="nav-link pb-0" href="<?=base_url('content/kontak') ?>">
        <i class="fas fa-fw fa-phone"></i>
        <span>Kontak</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider mt-3 d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
