<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @canany(['barang-list', 'stock-list', 'kategori-list'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="fas fa-boxes menu-icon"></i>
                    <span class="menu-title">Data Barang</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        @can('kategori-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('kategoris.index') }}">Kategori</a>
                            </li>
                        @endcan
                        @can('barang-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('barangs.index') }}">Barang</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        @canany(['gudang-list', 'lokasi-barang-list', 'rak-barang-list'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#gudang" aria-expanded="false" aria-controls="gudang">
                    <i class="fas fa-warehouse menu-icon"></i>
                    <span class="menu-title">Manajemen Gudang</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="gudang">
                    <ul class="nav flex-column sub-menu">
                        @can('lokasi-gudang-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gudangs.index') }}">Lokasi Gudang</a>
                            </li>
                        @endcan
                        @can('rak-barang-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('raks.index') }}">Rak Barang</a>
                            </li>
                        @endcan
                        @can('stock-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('stocks.index') }}">Stock</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        @canany(['transaksi-masuk-list', 'transaksi-keluar-list'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false"
                    aria-controls="transaksi">
                    <i class="fas fa-exchange-alt menu-icon"></i>
                    <span class="menu-title">Transaksi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="transaksi">
                    <ul class="nav flex-column sub-menu">
                        @can('transaksi-masuk-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaksis.index') }}">Barang Masuk</a>
                            </li>
                        @endcan
                        @can('transaksi-keluar-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('transaksi.out') }}">Barang Keluar</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        @canany(['laporan-masuk-list', 'laporan-keluar-list'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
                    <i class="fas fa-file-alt menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="laporan">
                    <ul class="nav flex-column sub-menu">
                        @can('laporan-masuk-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('laporantransaksimasuk') }}">Laporan Barang Masuk</a>
                            </li>
                        @endcan
                        @can('laporan-keluar-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('form_cetak_laporan_keluar') }}">Laporan Barang Keluar</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany

        @canany(['user-list', 'role-list'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#manage" aria-expanded="false" aria-controls="manage">
                    <i class="fas fa-cogs menu-icon"></i>
                    <span class="menu-title">Manage</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="manage">
                    <ul class="nav flex-column sub-menu">
                        @can('user-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                            </li>
                        @endcan
                        @can('role-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany
    </ul>
</nav>
