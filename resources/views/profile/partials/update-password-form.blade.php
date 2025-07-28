<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">كلمة
                    المرور الحالية</label>
                <input id="update_password_current_password" name="current_password" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    autocomplete="current-password" />
                @error('updatePassword.current_password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">كلمة المرور
                    الجديدة</label>
                <input id="update_password_password" name="password" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    autocomplete="new-password" />
                @error('updatePassword.password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="update_password_password_confirmation"
                    class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة المرور</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    autocomplete="new-password" />
                @error('updatePassword.password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200">
                تحديث كلمة المرور
            </button>

            @if (session('status') === 'password-updated')
                <div class="mr-4 flex items-center">
                    <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="mr-2 text-sm text-green-600">تم تحديث كلمة المرور بنجاح</span>
                </div>
            @endif
        </div>
    </form>
</section>
