<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/ ') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ordem</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <li class="nav-item">
                <a title="Gerenciar clientes" class="nav-link" href="<?= base_url('clientes') ?>">
                    <i class="fas fa-user-tie"></i>
                    <span>Clientes</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configurações
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a title="Gerenciar usuários" class="nav-link" href="<?= base_url('usuarios') ?>">
                    <i class="fas fa-users"></i>
                    <span>Usuários</span></a>
            </li>

            <li class="nav-item">
                <a title="Gerenciar dados do sistema" class="nav-link" href="<?= base_url('sistema') ?>">
                    <i class="fas fa-cog"></i>
                    <span>Sistema</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
