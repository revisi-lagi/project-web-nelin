<div class="min-h-screen flex flex-col justify-center items-center">

    <div class="w-[700px] p-20 shadow-lg rounded-lg">

        <div class="mb-10">
            <h1 class="text-lg font-semibold">Halo, Selamat Datang</h1>
            <p class="text-sm ">Registrasi Pelanggan</p>
        </div>

        <form action="<?= base_url('Auth/registrasi_pelanggan'); ?>" method="POST">

            <!-- Input Nama -->
            <div class=" mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="nama"
                    name="name"
                    value="<?= set_value('name'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('name'); ?></small>
            </div>

            <!-- Input Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="username"
                    name="username"
                    value="<?= set_value('username'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('username'); ?></small>
            </div>

            <!-- Input No Telp -->
            <div class="mb-4">
                <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telepon</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="no_telp"
                    name="no_telp"
                    value="<?= set_value('no_telp'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('no_telp'); ?></small>
            </div>

            <!-- Input Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="alamat"
                    name="alamat"
                    value="<?= set_value('alamat'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('alamat'); ?></small>
            </div>

            <!-- Input Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="password"
                    name="password">
                <small class="mt-2 text-red-500"><?= form_error('password'); ?></small>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="password2"
                    name="password2">
                <small class="mt-2 text-red-500"><?= form_error('password2'); ?></small>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-[#16998e] hover:bg-[#32b7ac] text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">Submit</button>
            </div>
        </form>

        <div class="mt-5">
            <p class="text-xs">Sudah Punya Akun? <a href="<?= base_url('Auth') ?>" class="font-semibold"> Login</a></p>
        </div>


    </div>


</div>