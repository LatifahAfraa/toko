<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="menu" id="menu">
                <li>
                    <a href="{{ route('index') }}" class="ai-icon active" aria-expanded="false">
                        <i class="flaticon-381-home-2"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}" class="ai-icon " aria-expanded="false">
                        <i class="flaticon-381-user"></i>
                        <span class="nav-text">User</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('barang.index') }}" class="ai-icon " aria-expanded="false">
                        <i class="flaticon-381-file"></i>
                        <span class="nav-text">Barang</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('penjualan.index') }}" class="ai-icon " aria-expanded="false">
                        <i class="flaticon-381-calculator"></i>
                        <span class="nav-text">Penjualan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('laporan') }}" class="ai-icon " aria-expanded="false">
                        <i class="flaticon-381-file"></i>
                        <span class="nav-text">Laporan</span>
                    </a>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="post" id="form-logout">
                        @csrf
                    </form>
                    <a onclick="$('#form-logout').submit()" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-turn-off"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                  </li>

        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->

<!--**********************************
            EventList
        ***********************************-->


