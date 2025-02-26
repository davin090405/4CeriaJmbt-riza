<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Lupa kata sandi anda? Tidak perlu khawatir, cukup tuliskan email terdaftar agar kami dapat menghubungi anda') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
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
                    class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm">
            </div>
            <p id="email-error" class="text-sm text-red-600 hidden">Masukkan alamat email yang valid.</p>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" id="masuk-reset-password" class="justify-center rounded-md bg-[#9F2A2A] px-3 py-1.5 text-sm font-semibold text-white shadow-sm 
                       hover:bg-[#9F2A2A] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                Kirim kode   
            </button>
        </div>
    </form>
</x-guest-layout>