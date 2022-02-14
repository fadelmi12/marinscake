<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?= base_url() ?>assets/img/logo.png" class="header-logo" /> <span class="logo-name">Maukos</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown <?php echo ($this->uri->segment(2) == '') ? 'active' : '' ?>">
                <a href="<?php echo base_url() ?>admin" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown <?php echo ($this->uri->segment(2) == 'kasir') ? 'active' : '' ?>">
                <a href="<?php echo base_url() ?>admin/kasir" class="nav-link"><i data-feather="monitor"></i><span>Kasir</span></a>
            </li>
            <li class="menu-header">Pengaturan</li>
            <li class="dropdown <?php echo ($this->uri->segment(2) === 'pengaturan') ? 'active' : '' ?>">
                <a href="<?php echo base_url() ?>admin/pengaturan" class="nav-link "><i data-feather="settings"></i><span>Pengaturan Akun</span></a>

            </li>

        </ul>
    </aside>
</div>