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
            <a href="<?= base_url('CApoteker/data_obat') ?>"
                class="p-4 flex items-center space-x-4 text-white font-semibold hover:bg-white hover:text-black rounded-lg group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    class="fill-white group-hover:fill-black"
                    viewBox="0 0 256 256">
                    <path d="M216.42,39.6a53.26,53.26,0,0,0-75.32,0L39.6,141.09a53.26,53.26,0,0,0,75.32,75.31h0L216.43,114.91A53.31,53.31,0,0,0,216.42,39.6ZM103.61,205.09h0a37.26,37.26,0,0,1-52.7-52.69L96,107.31,148.7,160ZM205.11,103.6,160,148.69,107.32,96l45.1-45.09a37.26,37.26,0,0,1,52.69,52.69ZM189.68,82.34a8,8,0,0,1,0,11.32l-24,24a8,8,0,1,1-11.31-11.32l24-24A8,8,0,0,1,189.68,82.34Z"></path>
                </svg>

                <span class="hidden" id="settingsText">Data Obat</span>
            </a>


        </div>
    </div>