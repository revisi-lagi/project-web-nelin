<div id="app" class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-[#16998e] text-black h-full transition-all duration-300 w-16 border-r-2 border-black" data-open="false">
        <div class="p-4 flex items-center space-x-4">
            <button id="toggleSidebar" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" viewBox="0 0 256 256">
                    <path d="M32,64a8,8,0,0,1,8-8H216a8,8,0,0,1,0,16H40A8,8,0,0,1,32,64ZM216,96H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,40H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Zm0,40H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path>
                </svg>
            </button>
            <span class="hidden text-white font-semibold" id="sidebarTitle">Dashboard</span>
        </div>
        <div class="space-y-2">
            <li class="p-4 flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" viewBox="0 0 256 256">
                    <path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path>
                </svg>
                <span class="hidden text-white font-semibold" id="homeText">Home</span>
            </li>

            <a href="<?= base_url('CAdmin/konfirmasi_pemesanan') ?>"
                class="p-4 flex items-center space-x-4 text-white font-semibold hover:bg-white hover:text-black rounded-lg group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    class="fill-white group-hover:fill-black"
                    viewBox="0 0 256 256">
                    <path d="M72,104a8,8,0,0,1,8-8h96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,104Zm8,40h96a8,8,0,0,0,0-16H80a8,8,0,0,0,0,16ZM232,56V208a8,8,0,0,1-11.58,7.15L192,200.94l-28.42,14.21a8,8,0,0,1-7.16,0L128,200.94,99.58,215.15a8,8,0,0,1-7.16,0L64,200.94,35.58,215.15A8,8,0,0,1,24,208V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56Zm-16,0H40V195.06l20.42-10.22a8,8,0,0,1,7.16,0L96,199.06l28.42-14.22a8,8,0,0,1,7.16,0L160,199.06l28.42-14.22a8,8,0,0,1,7.16,0L216,195.06Z"></path>
                </svg>
                <span class="hidden" id="settingsText">Konfirmasi Pesanan</span>
            </a>

            <a href="<?= base_url('CAdmin/laporan_transaksi') ?>"
                class="p-4 flex items-center space-x-4 text-white font-semibold hover:bg-white hover:text-black rounded-lg group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    class="fill-white group-hover:fill-black"
                    viewBox="0 0 256 256">
                    <path d="M88,224a16,16,0,1,1-16-16A16,16,0,0,1,88,224Zm128-16a16,16,0,1,0,16,16A16,16,0,0,0,216,208Zm24-32H56V75.31A15.86,15.86,0,0,0,51.31,64L29.66,42.34A8,8,0,0,0,18.34,53.66L40,75.31V176H32a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM72,144V72A16,16,0,0,1,88,56h32V40a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V56h32a16,16,0,0,1,16,16v72a16,16,0,0,1-16,16H88A16,16,0,0,1,72,144Zm64-88h32V40H136ZM88,144H216V72H88Z"></path>
                </svg>
                <span class="hidden" id="aboutText">Laporan</span>
            </a>

            <a href="<?= base_url('CAdmin/tambah_akun_apoteker') ?>"
                class="p-4 flex items-center space-x-4 text-white font-semibold hover:bg-white hover:text-black rounded-lg group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    class="fill-white group-hover:fill-black"
                    viewBox="0 0 256 256">
                    <path d="M256,136a8,8,0,0,1-8,8H232v16a8,8,0,0,1-16,0V144H200a8,8,0,0,1,0-16h16V112a8,8,0,0,1,16,0v16h16A8,8,0,0,1,256,136Zm-57.87,58.85a8,8,0,0,1-12.26,10.3C165.75,181.19,138.09,168,108,168s-57.75,13.19-77.87,37.15a8,8,0,0,1-12.25-10.3c14.94-17.78,33.52-30.41,54.17-37.17a68,68,0,1,1,71.9,0C164.6,164.44,183.18,177.07,198.13,194.85ZM108,152a52,52,0,1,0-52-52A52.06,52.06,0,0,0,108,152Z"></path>
                </svg>
                <span class="hidden" id="tambahAkun">Tambah Akun Apoteker</span>
            </a>
        </div>
    </div>