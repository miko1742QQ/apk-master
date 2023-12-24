<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../../logopuskesmas.png" style="width: 100%; height: 100%;">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">APK KIM</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <?php if (in_groups('Administrator') || in_groups('Pimpinan')) : ?>
            <li class="menu-item ">
                <a href="dashboard" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-home"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="management" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-credit-card"></i>
                    <div data-i18n="Management">Management</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="kim" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-gift"></i>
                    <div data-i18n="KIM">KIM</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-server"></i>
                    <div data-i18n="Setting">Setting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="daftar_karyawan" class="menu-link">
                            <div data-i18n="Konsumen">Konsumen</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="daftar_pengguna" class="menu-link">
                            <div data-i18n="Akses Login">Akses Login</div>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif ?>

        <?php if (in_groups('Konsumen')) : ?>
            <li class="menu-item">
                <a href="dashboard" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="management" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-credit-card"></i>
                    <div data-i18n="Management">Management</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="kim" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-gift"></i>
                    <div data-i18n="KIM">KIM</div>
                </a>
            </li>
        <?php endif ?>
    </ul>
</aside>