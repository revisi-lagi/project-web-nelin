<div class="w-full flex justify-between border-b border-black">

    <div class="w-[60%] px-20 py-4 flex flex-col justify-start ">
        <div class="w-full flex justify-between ">
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#46de9c" viewBox="0 0 256 256">
                    <path d="M72,144H32a8,8,0,0,1,0-16H67.72l13.62-20.44a8,8,0,0,1,13.32,0l25.34,38,9.34-14A8,8,0,0,1,136,128h24a8,8,0,0,1,0,16H140.28l-13.62,20.44a8,8,0,0,1-13.32,0L88,126.42l-9.34,14A8,8,0,0,1,72,144ZM178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,.75,0,1.5,0,2.25a8,8,0,1,0,16-.5c0-.58,0-1.17,0-1.75A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46c0,53.61-77.76,102.15-96,112.8-10.83-6.31-42.63-26-66.68-52.21a8,8,0,1,0-11.8,10.82c31.17,34,72.93,56.68,74.69,57.63a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40Z"></path>
                </svg>
                <h1 class="font-bold">Nelin Medical</h1>
            </div>

            <div class="flex items-center gap-10">
                <a href="<?= base_url('Cpages/pelanggan') ?>" class="text-sm">Beranda</a>
                <a href="<?= base_url('CPelanggan/produk') ?>" class="text-sm">Produk</a>
                <a href="<?= base_url('CPelanggan/bantuan') ?>" class="text-sm">Bantuan</a>
            </div>
        </div>
    </div>

    <div class="w-[40%] px-20 py-4 flex flex-col justify-start">

        <div class="w-full flex justify-end items-center gap-10">

            <div class="flex items-center gap-5">

                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                </a>


                <a href="<?= base_url('CPelanggan/keranjang/') ?>" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                        <path d="M104,216a16,16,0,1,1-16-16A16,16,0,0,1,104,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,192,200ZM239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM221.47,80H61.64l22.81,82.14A8,8,0,0,0,92.16,168H191a8,8,0,0,0,7.71-5.86Z"></path>
                    </svg>
                    <?php if ($cartCount > 0): ?>

                        <p class="absolute -top-2 -right-3  py-[1px] px-[5px] text-white text-xs bg-[#3f72f5] border border-black rounded-full"><?= $cartCount; ?></p>

                    <?php endif; ?>
                </a>
            </div>

            <ul class="flex gap-3 text-sm">
                <?php if ($this->session->userdata('role_id') == 3): ?>
                    <li>
                        <span>Halo, <?= $this->session->userdata('username'); ?>!</span>
                    </li>
                    <li>
                        <a href="<?= base_url('Auth/logout') ?>" class="px-2 py-0.5 border-2 border-black rounded-xl">Keluar</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?= base_url('Auth') ?>">Masuk</a>
                    </li>
                    <li>
                        <a href="<?= base_url('Auth/registrasi_pelanggan') ?>">Daftar</a>
                    </li>
                <?php endif; ?>
            </ul>

        </div>

    </div>

</div>