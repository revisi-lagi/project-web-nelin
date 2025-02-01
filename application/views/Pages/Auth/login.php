<div class="min-h-screen flex flex-col justify-center items-center">

    <div class="w-[700px] p-20 shadow-lg rounded-lg">

        <div class="mb-10">
            <h1 class="text-lg font-semibold">Halo, Selamat Datang</h1>
            <p class="text-sm ">Login Pelanggan</p>
        </div>

        <div class="w-[300px] mt-5 flex flex-col justify-start font-semibold">
            <?php if ($this->session->flashdata('message', 'error')) : ?>
                <?= $this->session->flashdata('message', 'error'); ?>
            <?php endif; ?>
        </div>

        <form action="<?= base_url('Auth'); ?>" method="POST">

            <!-- Input Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="username"
                    name="username"
                    value="<?= set_value('username'); ?>">
                <small class="mt-2 text-red-500"><?= form_error('username'); ?></small>
            </div>

            <!-- Input Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    id="password"
                    name="password">
                <small class="mt-2 text-red-500"><?= form_error('password'); ?></small>
            </div>


            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-[#16998e] hover:bg-[#32b7ac] text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">Submit</button>
            </div>


            <div class="mt-5">
                <p class="text-xs">Belum Punya Akun? <a href="<?= base_url('Auth/registrasi_pelanggan') ?>" class="font-semibold"> Registrasi</a></p>
            </div>

        </form>


    </div>


</div>