<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?= base_url() ?>assets/img/logo.png" class="header-logo" /> <span class="logo-name">Maukos</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown <?php echo ($this->uri->segment(2) == '') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>admin" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(2) == 'kasir') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>admin/kasir" class="nav-link"><i data-feather="monitor"></i><span>Kasir</span></a>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(2) === 'produk') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Produk</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/produk">Produk</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/produk/tambah_produk">Tambah Produk</a></li>
                </ul>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(2) === 'transaksi') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-cart"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/transaksi">Transaksi Langsung</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/transaksi/preorder">Transaksi Preorder</a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="dropdown <?php echo ($this->uri->segment(2) === 'karyawan') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>Karyawan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/karyawan">Daftar Karyawan</a></li>
                    
                </ul>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(2) === 'laporan') ? 'active' : '' ?>">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/laporan/laporan_gaji">Laporan Gaji</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/laporan/laporan_penjualan">Laporan Penjualan</a></li>
                    <li><a class="nav-link" href="<?php echo base_url() ?>admin/laporan/laporan_keuntungan">Laporan Keuntungan</a></li>
                </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="dropdown <?php echo ($this->uri->segment(2) === 'pengaturan') ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>admin/pengaturan" class="nav-link "><i data-feather="settings"></i><span>Pengaturan Akun</span></a>

            </li>

        </ul>
    </aside>
</div>