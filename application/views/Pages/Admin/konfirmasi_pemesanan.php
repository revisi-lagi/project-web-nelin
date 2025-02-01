<div class="w-full px-10 py-5">


    <div class="p-4 flex justify-between items-center border-2 border-black rounded-lg">
        <div class="">
            <h1 class="text-2xl font-bold">Konfirmasi Pemesanan</h1>
        </div>
        <div>
            <a href="<?= base_url('Auth/logout') ?>" class="py-1 px-5 text-sm text-white font-semibold bg-[#16998e] border border-black rounded-lg">logout</a>
        </div>
    </div>


    <div class="h-[700px] mt-10 border-2 border-black rounded-lg">


        <div class="p-4 container mx-auto mt-10">
            <h1 class="text-2xl font-bold mb-6">Daftar Transaksi</h1>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <table class="min-w-full bg-white border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID Transaksi</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama User</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Obat</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Jumlah</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Total Harga</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Status Pembayaran</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Bukti Pembayaran</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($transaksi)): ?>
                        <?php foreach ($transaksi as $t): ?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"><?= $t['id_transaksi']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= $t['nama_user']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= $t['nama_obat']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= $t['jumlah']; ?></td>
                                <td class="border border-gray-300 px-4 py-2">Rp. <?= number_format($t['total_harga'], 2, ',', '.'); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?= ucfirst($t['status_pembayaran']); ?></td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <?php if ($t['bukti_pembayaran']): ?>
                                        <a href="<?= base_url('uploads/' . $t['bukti_pembayaran']); ?>" target="_blank" class="text-blue-500 hover:underline">
                                            Lihat Bukti
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-500">Tidak Ada</span>
                                    <?php endif; ?>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <?php if ($t['status_pembayaran'] === 'menunggu'): ?>
                                        <a href="<?= site_url('CAdmin/konfirmasi_transaksi/' . $t['id_transaksi']); ?>"
                                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                            Konfirmasi
                                        </a>
                                    <?php elseif ($t['status_pembayaran'] === 'konfirmasi'): ?>
                                        <span class="text-green-500 font-semibold">Sudah Dikonfirmasi</span>
                                    <?php else: ?>
                                        <span class="text-red-500 font-semibold">Gagal</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-4">Tidak ada transaksi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>




    </div>


</div>