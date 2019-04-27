<aside class="left-sidebar">
    <ul class="nav-bar navbar-inverse hidden-xs-down">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebartoggler  waves-effect waves-dark float-right" href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a>
        </li>
    </ul>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="clearfix"></li>
                <li class="">
                    <a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false">
                        <i class="flaticon-desktop-computer-screen-with-rising-graph"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @if (mb_strtolower(Auth::user()->jabatan, 'utf-8') === 'operation')
                <li class="">
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="fa fa-cart-plus"></i><span class="hide-menu">Pemesanan</span>
                    </a>

                    <ul aria-expanded="true" class="collapse">
                        <li><a href="{{ route('pemesanan.index') }}" class="">Riwayat Pemesanan</a></li>
                        <li><a href="{{ route('pemesanan.form') }}" class="">Tambah Pemesanan</a></li>
                    </ul>
                </li>
                @endif

                @if (mb_strtolower(Auth::user()->jabatan, 'utf-8') === 'admin')
                <li class="">
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="flaticon-folder"></i><span class="hide-menu">Manajemen</span>
                    </a>

                    <ul aria-expanded="true" class="collapse">
                        <li><a href="{{ route('pemesanan.index') }}" class="">Pesanan Masuk</a></li>
                        <li><a href="{{ route('barangKeluar.index') }}" class="">Barang Keluar</a></li>
                        <li><a href="{{ route('barangMasuk.index') }}" class="">Barang Masuk</a></li>
                        <li>
                            <a href="#" class="has-arrow waves-effect waves-dark">Data Barang</a>

                            <ul aria-expanded="true" class="collapse">
                                <li><a href="{{ route('barang.index') }}">Barang</a></li>
                                <li><a href="{{ route('merk.index') }}">Merk</a></li>
                                <li><a href="{{ route('jenisBarang.index') }}">Jenis Barang</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('users.index') }}" class="">Data User</a></li>
                        <li><a href="{{ route('laporan') }}" class="">Laporan</a></li>
                    </ul>
                </li>
                @endif

                @if (mb_strtolower(Auth::user()->jabatan, 'utf-8') === 'manajer')
                <li>
                    <a href="{{ route('laporan') }}" class=""><i class="flaticon-folder"></i><span class="hide-menu">Laporan</span></a>
                </li>
                @endif

                <li class="">
                    <a href="{{ route('logout') }}" aria-expanded="false" onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i><span class="hide-menu">Logout</span>
                    </a>
                    <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>        <!-- ============================================================== -->