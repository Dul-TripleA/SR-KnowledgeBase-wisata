        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">
            <!-- LOGO -->
            <a href="<?= base_url('/') ?>" class="logo logo-light">
                <span class="logo-lg ms-4">
                    <img src="<?= base_url("img/$settingWeb[logo_utama]") ?>" alt="" width="100">
                </span>
                <span class="logo-sm text-center">
                    <img src="<?= base_url("img/$settingWeb[icon_logo]") ?>" alt="" height="30">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="">
                <!--- Sidemenu -->
                <ul class="side-nav">
                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('/dashboard') ?>" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Dashboards </span>
                        </a>
                    </li>

                    <li class="side-nav-title side-nav-item">Apps</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarMainData" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-folder"></i>
                            <span> Main Data </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMainData">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="<?= base_url('/main_data/destinasi_wisata') ?>">Destinasi Wisata</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/main_data/kategori_wisata') ?>">Kategori Wisata</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/main_data/fasilitas_wisata') ?>">Fasilitas Wisata</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/main_data/kecamatan') ?>">Data Kecamatan</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/main_data/users') ?>">User Data</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarMainData" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-history"></i>
                            <span> Riwayat Rekomendasi </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMainData">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="<?= base_url('/riwayat_rekomendasi') ?>">
                                        Riwayat Rekomendasi
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('/riwayat_rekomendasi_unknown_user') ?>">
                                        Unknown User History
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->