<x-guest-layout>
    <body>
        <!-- Judul Halaman -->
        <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
            Daftarkan akun anda
        </h2>

        <!-- Form Pendaftaran -->
        <form id="registration-form" class="space-y-6" action="#" method="POST" onsubmit="return validateForm()">
            @csrf

            <!-- Input Nama Lengkap -->
            <div>
                <label for="nama-lengkap" class="block text-sm font-medium text-gray-900">
                    Nama Lengkap
                </label>
                <div class="mt-2">
                    <input 
                        id="nama-lengkap" 
                        name="nama_lengkap" 
                        type="text" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                               ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm">
                    <p id="nama-lengkap-error" class="mt-1 text-sm text-red-600 hidden">Nama lengkap tidak boleh kosong.</p>
                </div>
            </div>

            <!-- Input Nama Pengguna -->
            <div>
                <label for="nama-pengguna" class="block text-sm font-medium text-gray-900">
                    Nama Pengguna
                </label>
                <div class="mt-2">
                    <input 
                        id="nama-pengguna" 
                        name="nama_pengguna" 
                        type="text" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                               ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm">
                    <p id="nama-pengguna-error" class="mt-1 text-sm text-red-600 hidden">Nama pengguna tidak boleh kosong.</p>
                </div>
            </div>

            <!-- Input Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-900">
                    Alamat Email
                </label>
                <div class="mt-2">
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        autocomplete="email" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                               ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm">
                    <p id="email-error" class="mt-1 text-sm text-red-600 hidden">Masukkan alamat email yang valid.</p>
                </div>
            </div>

            <!-- Input Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-900">
                    Password
                </label>
                <div class="relative mt-2">
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        autocomplete="current-password" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm pr-10">
                    <button 
                        type="button" 
                        onclick="togglePassword('password', 'password-icon')" 
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                        <img 
                            src="/images/icons/eye.png" 
                            alt="Show password" 
                            id="password-icon" 
                            class="h-5 w-5">
                    </button>
                    <p id="password-error" class="mt-1 text-sm text-red-600 hidden">Password harus memiliki minimal 8 karakter.</p>
                </div>
            </div>

            <!-- Input Konfirmasi Password -->
            <div>
                <label for="password-confirm" class="block text-sm font-medium text-gray-900">
                    Konfirmasi Password
                </label>
                <div class="relative mt-2">
                    <input
                        id="password-confirm" 
                        name="password_confirmation" 
                        type="password" 
                        autocomplete="current-password" 
                        required 
                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm 
                            ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm pr-10">
                    <button 
                        type="button" 
                        onclick="togglePassword('password-confirm', 'confirm-icon')" 
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                        <img 
                            src="/images/icons/eye.png" 
                            alt="Show password" 
                            id="confirm-icon" 
                            class="h-5 w-5">
                    </button>
                    <p id="password-confirm-error" class="mt-1 text-sm text-red-600 hidden">Password dan Konfirmasi Password tidak cocok.</p>
                </div>
            </div>

            <!-- Tombol Daftar -->
            <div>
                <button 
                    type="submit" 
                    class="flex w-full justify-center rounded-md bg-[#9F2A2A] px-3 py-1.5 text-sm font-semibold text-white shadow-sm 
                           hover:bg-[#9F2A2A] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                    Daftar
                </button>
            </div>
        </form>

        <!-- Tautan Login -->
        <p class="mt-10 text-center text-sm text-gray-500">
            Sudah punya akun?
            <a href="/login" class="font-semibold text-[#9F2A2A] opacity-100 hover:opacity-45">
                Login di sini
            </a>
        </p>

        <!-- Script Toggle Password -->
        <script>
            function togglePassword(inputId, iconId) {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.src = '/images/icons/hidden.png'; // Ganti ikon menjadi 'eye-off'
                } else {
                    input.type = 'password';
                    icon.src = '/images/icons/eye.png'; // Kembali ke ikon 'eye'
                }
            }

            function validateForm() {
                let isValid = true;

                // Reset all error messages
                const errors = document.querySelectorAll('.text-red-600');
                errors.forEach((error) => error.classList.add('hidden'));

                // Validate Nama Lengkap
                const namaLengkap = document.getElementById('nama-lengkap').value;
                if (namaLengkap.trim() === '') {
                    document.getElementById('nama-lengkap-error').classList.remove('hidden');
                    isValid = false;
                }

                // Validate Nama Pengguna
                const namaPengguna = document.getElementById('nama-pengguna').value;
                if (namaPengguna.trim() === '') {
                    document.getElementById('nama-pengguna-error').classList.remove('hidden');
                    isValid = false;
                }

                // Validate Email
                const email = document.getElementById('email').value;
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email.match(emailPattern)) {
                    document.getElementById('email-error').classList.remove('hidden');
                    isValid = false;
                }

                // Validate Password
                const password = document.getElementById('password').value;
                if (password.length < 8) {
                    document.getElementById('password-error').classList.remove('hidden');
                    isValid = false;
                }

                // Validate Password Confirm
                const passwordConfirm = document.getElementById('password-confirm').value;
                if (password !== passwordConfirm) {
                    document.getElementById('password-confirm-error').classList.remove('hidden');
                    isValid = false;
                }

                return isValid;
            }
        </script>
    </body>
</x-guest-layout>