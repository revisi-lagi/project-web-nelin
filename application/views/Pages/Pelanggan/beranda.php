<div class="relative w-full flex justify-between">
    <div class="w-[60%] px-20 py-4 flex flex-col justify-start">

        <div class="w-full flex justify-between ">
            <div class="flex items-center gap-3">
                <!-- <img src="<?= base_url('assets/logo/heart-rate.png') ?>" alt="" class="w-[50px]"> -->
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

        <div class="w-[700px] mt-[200px]">
            <h1 class="text-4xl font-semibold">Solusi Kesehatan Modern, Lebih Dekat dengan Anda!</h1>

            <div class="mt-10">
                <a href="" class="px-10 py-3 text-xl font-semibold text-white bg-[#0f1681] border-2 border-black">Daftar Sekarang !</a>
            </div>
        </div>

    </div>

    <div class="absolute lg:-bottom-[85px] 2xl:-bottom-[100px] lg:right-[30px] 2xl:right-[120px] min-h-screen flex justify-center items-center">
        <img src="<?= base_url('assets/bg/dokter.png') ?>" alt="" class="lg:w-[950px] 2xl:w-[1100px]">
    </div>

    <div class="w-[40%] h-screen px-20 py-4 flex items-start justify-end bg-[#c8f8e3] border border-black">

        <div class="w-full flex justify-end items-center gap-20">

            <div class="pt-2 flex items-center gap-3 ">
                <a href="<?= base_url('Auth/registrasi_pelanggan') ?>" class="px-3 py-1 text-sm ">Daftar</a>
                <a href="<?= base_url('Auth') ?>" class="px-3 py-1 text-sm ">Masuk</a>
            </div>

        </div>

    </div>
</div>