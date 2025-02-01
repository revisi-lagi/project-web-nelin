<div class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 p-4 text-white">
            <h1 class="text-3xl font-bold">Detail Produk</h1>
        </div>
        <!-- Content -->
        <div class="p-6">
            <div class="flex flex-col md:flex-row items-start md:items-center">
                <!-- Product Image -->
                <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                    <img src="<?= base_url('assets/obat/') .  $produk['gambar'] ?>" alt="Gambar <?= $produk['nama_obat'] ?>" class="w-64 h-64 object-cover rounded-lg shadow-md border border-gray-200">

                </div>
                <!-- Product Details -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4"><?= $produk['nama_obat'] ?></h2>
                    <p class="text-gray-600"><strong>Kode Obat:</strong> <?= $produk['kode_obat'] ?></p>
                    <p class="text-gray-600"><strong>Stok:</strong> <?= $produk['stok'] ?></p>
                    <p class="text-gray-600"><strong>Harga:</strong> Rp <?= number_format($produk['harga'], 2) ?></p>
                    <p class="text-gray-600"><strong>Unit:</strong> <?= $produk['nama_unit'] ?></p>
                </div>
            </div>
            <!-- Quantity Input -->
            <div class="mt-6">
                <form action="<?= base_url('CPelanggan/tambah_keranjang') ?>" method="post" class="flex flex-col space-y-4">
                    <input type="hidden" name="kode_obat" value="<?= $produk['kode_obat'] ?>">
                    <div>
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" min="1" max="<?= $produk['stok'] ?>" value="1"
                            class="mt-1 w-20 rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex space-x-4">
                        <a href="<?= base_url('obat') ?>" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Kembali</a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>