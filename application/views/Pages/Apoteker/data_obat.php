<div class="w-full px-10 py-5">


    <div class="p-4 flex justify-between items-center border-2 border-black rounded-lg">
        <div class="">
            <h1 class="text-2xl font-bold">Data Obat</h1>
        </div>
        <div>
            <a href="<?= base_url('Auth/logout') ?>" class="py-1 px-5 text-sm text-white font-semibold bg-[#16998e] border border-black rounded-lg">logout</a>
        </div>
    </div>


    <div class="overflow-y-auto mt-10 h-[700px] p-4 border-2 border-black rounded-lg">
        <a href="<?= base_url('CApoteker/tambah_obat') ?>" class="mb-4 inline-block bg-[#16998e] text-white px-4 py-2 rounded-lg">Tambah Obat</a>
        <table class="min-w-full bg-white border border-gray-300 shadow rounded">
            <thead>
                <tr
                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="px-4 py-6 border-b text-center">No</th>
                    <th class="px-4 py-6 border-b text-center">Kode Obat</th>
                    <th class="px-4 py-6 border-b text-center">Nama Obat</th>
                    <th class="px-4 py-6 border-b text-center">Stok</th>
                    <th class="px-4 py-6 border-b text-center">Harga</th>
                    <th class="px-4 py-6 border-b text-center">Unit</th>
                    <th class="px-4 py-6 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($obat as $index => $item): ?>
                    <tr>
                        <td class="px-4 py-6 border-b text-center"><?= $index + 1 ?></td>
                        <td class="px-4 py-6 border-b text-center"><?= $item['kode_obat'] ?></td>
                        <td class="px-4 py-6 border-b text-center"><?= $item['nama_obat'] ?></td>
                        <td class="px-4 py-6 border-b text-center"><?= $item['stok'] ?></td>
                        <td class="px-4 py-6 border-b text-center"><?= number_format($item['harga'], 2) ?></td>
                        <td class="px-4 py-6 border-b text-center"><?= $item['nama_unit'] ?></td>
                        <td class=" px-6 py-6 border-b text-center">
                            <a href="<?= base_url('CApoteker/hapus_obat/' . $item['id_obat']) ?>" class="px-3 py-1 text-white border-2 border-black rounded-lg bg-[#16998e]" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>