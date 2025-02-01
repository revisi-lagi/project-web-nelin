<div class="w-full px-10 py-5">
    <div class="p-4 flex justify-between items-center border-2 border-black rounded-lg">
        <div class="">
            <h1 class="text-2xl font-bold">Tambah Akun Apoteker</h1>
        </div>
        <div>
            <a href="<?= base_url('Auth/logout') ?>" class="py-1 px-5 text-sm text-white font-semibold bg-[#16998e] border border-black rounded-lg">logout</a>
        </div>
    </div>

    <div class="mt-10 bg-white p-8 rounded-lg shadow-lg w-full h-[700px] overflow-y-auto border-2 border-black ">
        <form action="<?= base_url('CAdmin/tambah_akun_apoteker') ?>" method="POST" class="space-y-4">
            <!-- Nama Apoteker -->
            <div>
                <label for="nama_apoteker" class="block text-gray-700 font-medium">Nama Apoteker</label>
                <input
                    type="text"
                    id="nama_apoteker"
                    name="nama_apoteker"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama apoteker"
                    value="<?= set_value('nama_apoteker'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('nama_apoteker'); ?></small>

            </div>

            <!-- Nomor Telepon -->
            <div>
                <label for="no_telp" class="block text-gray-700 font-medium">Nomor Telepon</label>
                <input
                    type="text"
                    id="no_telp"
                    name="no_telp"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="081234567890"
                    value="<?= set_value('no_telp'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('no_telp'); ?></small>
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                <input
                    id="alamat"
                    name="alamat"
                    rows="3"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan alamat lengkap"
                    value="<?= set_value('alamat'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('alamat'); ?></small>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label for="jenis_kelamin" class="block text-gray-700 font-medium">Jenis Kelamin</label>
                <select
                    id="jenis_kelamin"
                    name="jenis_kelamin"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="<?= set_value('jenis_kelamin'); ?>">
                    >
                    <option value="">Pilih jenis kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <small class="mt-2 text-red-500"><?= form_error('jenis_kelamin'); ?></small>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label for="tanggal_lahir" class="block text-gray-700 font-medium">Tanggal Lahir</label>
                <input
                    type="date"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="<?= set_value('tanggal_lahir'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('tanggal_lahir'); ?></small>
            </div>

            <!-- Username -->
            <div>
                <label for="username" class="block text-gray-700 font-medium">username</label>
                <input
                    type="username"
                    id="username"
                    name="username"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukan username"
                    value="<?= set_value('username'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('username'); ?></small>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="mt-1 px-3 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukan Password">
                <small class="mt-2 text-red-500"><?= form_error('password'); ?></small>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="w-full bg-[#16998e] text-white px-4 py-2 rounded-lg font-medium hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
            </div>
        </form>
    </div>


</div>