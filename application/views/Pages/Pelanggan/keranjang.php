<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>

        <?php if (!empty($keranjang)) : ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full bg-white rounded shadow">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left">Produk</th>
                            <th class="px-4 py-2 text-left">Jumlah</th>
                            <th class="px-4 py-2 text-left">Harga</th>
                            <th class="px-4 py-2 text-left">Subtotal</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalHarga = 0;
                        foreach ($keranjang as $item):
                            $subtotal = $item['jumlah'] * $item['harga'];
                            $totalHarga += $subtotal;
                        ?>
                            <tr>
                                <td class="px-4 py-2"><?= $item['nama_obat']; ?></td>
                                <td class="px-4 py-2">
                                    <form action="<?= base_url('CartController/updateJumlah'); ?>" method="post" class="flex items-center space-x-2">
                                        <input type="hidden" name="id_keranjang" value="<?= $item['id_keranjang']; ?>">
                                        <input
                                            type="number"
                                            name="jumlah"
                                            value="<?= $item['jumlah']; ?>"
                                            min="1"
                                            class="w-16 border rounded px-2 py-1 focus:outline-none focus:ring focus:ring-indigo-200">
                                        <button
                                            type="submit"
                                            class="text-blue-500 hover:underline">
                                            Update
                                        </button>
                                    </form>
                                </td>
                                <td class="px-4 py-2">Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                                <td class="px-4 py-2">Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                                <td class="px-4 py-2 text-center">
                                    <form action="<?= base_url('CartController/hapus'); ?>" method="post">
                                        <input type="hidden" name="id_keranjang" value="<?= $item['id_keranjang']; ?>">
                                        <button
                                            type="submit"
                                            class="text-red-500 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-between items-center">
                <h2 class="text-lg font-bold">Total: Rp <?= number_format($totalHarga, 0, ',', '.'); ?></h2>
                <form action="<?= base_url('CPelanggan/checkout'); ?>" method="post" enctype="multipart/form-data" class="flex">
                    <div class="">
                        <p class="font-semibold">Bukti Pembayaran</p>
                        <input type="file" name="bukti_pembayaran" required>
                    </div>
                    <button
                        type="submit"
                        class="bg-indigo-500 text-white px-6 py-2 rounded hover:bg-indigo-600 transition">
                        Checkout
                    </button>
                </form>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">Keranjang Anda kosong.</p>
        <?php endif; ?>
    </div>
</body>