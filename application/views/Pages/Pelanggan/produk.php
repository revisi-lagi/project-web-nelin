<div class="px-20 py-10">

    <div class="mt-10 flex flex-wrap gap-20 ">

        <?php foreach ($obat as $b): ?>

            <div class="w-[312px] pb-5 flex flex-col gap-y-3 border border-black rounded-lg">
                <div class="w-[310px] py-2 flex justify-center bg-[#ebebeb] border-b border-black rounded-lg">
                    <img src="<?= base_url('assets/obat/') . $b['gambar'] ?>" alt="" class="w-[90%] h-[330px] object-contain rounded-lg">
                </div>
                <div class="px-2">
                    <h1 class="text-lg font-semibold"> <br> <?= $b['nama_obat'] ?> </h1>
                    <p class="mt-5 text-sm font-bold">Rp <?= number_format($b['harga'], 0, ',', '.'); ?></p>

                    <form method="POST" action="<?= base_url('CPelanggan/tambah_keranjang') ?>" class="mt-5">

                        <input type="text" name="kode_obat" value="<?= $b['kode_obat'] ?>" hidden>
                        <input type="text" name="jumlah" value="1" hidden>

                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000000" viewBox="0 0 256 256">
                                <path d="M104,216a16,16,0,1,1-16-16A16,16,0,0,1,104,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,192,200ZM239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM221.47,80H61.64l22.81,82.14A8,8,0,0,0,92.16,168H191a8,8,0,0,0,7.71-5.86Z"></path>
                            </svg>
                        </button>

                    </form>
                </div>
            </div>

        <?php endforeach; ?>

    </div>


</div>