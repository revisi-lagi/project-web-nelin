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
        <h1 class="text-2xl font-bold mb-4">Tambah Obat</h1>
        <form action="<?= base_url('CApoteker/tambah_obat') ?>" method="post" class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label for="kode_obat" class="block text-gray-700 font-bold mb-2">Kode Obat</label>
                <input type="text" name="kode_obat" id="kode_obat" class="w-full border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="nama_obat" class="block text-gray-700 font-bold mb-2">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" class="w-full border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-gray-700 font-bold mb-2">Stok</label>
                <input type="number" name="stok" id="stok" class="w-full border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 font-bold mb-2">Harga</label>
                <input type="text" name="harga" id="harga" class="w-full border-gray-300 rounded p-2" required>
            </div>
            <div class="mb-4">
                <label for="id_unit" class="block text-gray-700 font-bold mb-2">Unit</label>
                <select name="id_unit" id="id_unit" class="w-full border-gray-300 rounded p-2">
                    <?php foreach ($units as $unit): ?>
                        <option value="<?= $unit['id_unit'] ?>"><?= $unit['nama_unit'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar</label>
                <input type="text" name="gambar" id="gambar" class="w-full border-gray-300 rounded p-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            <a href="<?= base_url('CApoteker/data_obat') ?>" class="ml-4 text-gray-500 hover:underline">Batal</a>
        </form>

    </div>


</div>