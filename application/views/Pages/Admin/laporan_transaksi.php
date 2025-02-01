<div class="w-full px-10 py-5">

    <div class="p-4 flex justify-between items-center border-2 border-black rounded-lg">
        <div class="">
            <h1 class="text-2xl font-bold">Dashboard</h1>
        </div>
        <div>
            <a href="<?= base_url('Auth/logout') ?>" class="py-1 px-5 text-sm text-white font-semibold bg-[#16998e] border border-black rounded-lg">logout</a>
        </div>
    </div>


    <div class="h-[400px] mt-10 p-5 overflow-y-auto flex gap-20 rounded-lg  border-black">

        <div class="container mx-auto my-10">


            <!-- Form Filter Periode -->
            <form method="POST" action="<?= base_url('CAdmin/laporan_transaksi') ?>" class="bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="<?= isset($start_date) ? $start_date : '' ?>" required>
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                        <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="<?= isset($end_date) ? $end_date : '' ?>" required>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" name="filter" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Filter
                        </button>
                    </div>
                </div>
            </form>

            <!-- Tabel Laporan -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">#</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Nama User</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Nama Obat</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Jumlah</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Total Harga</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Status Pembayaran</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Bukti Pembayaran</th>
                            <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-700">Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($laporan)): ?>
                            <?php foreach ($laporan as $index => $item): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700"><?= $index + 1 ?></td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700"><?= $item['nama_user'] ?></td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700"><?= $item['nama_obat'] ?></td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700"><?= $item['jumlah'] ?></td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">Rp <?= number_format($item['total_harga'], 2, ',', '.') ?></td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700"><?= ucfirst($item['status_pembayaran']) ?></td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700">
                                        <?php if (!empty($item['bukti_pembayaran'])): ?>
                                            <a href="<?= base_url('uploads/' . $item['bukti_pembayaran']) ?>" target="_blank" class="text-indigo-600 hover:underline">Lihat</a>
                                        <?php else: ?>
                                            Tidak Ada
                                        <?php endif; ?>
                                    </td>
                                    <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700"><?= date('d-m-Y H:i:s', strtotime($item['created_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="border border-gray-200 px-4 py-2 text-center text-sm text-gray-500">Tidak ada data transaksi pada periode ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>