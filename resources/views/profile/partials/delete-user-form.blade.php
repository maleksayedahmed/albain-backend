<div class="space-y-6">
    <div class="bg-red-50 border border-red-200 rounded-md p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="mr-3">
                <p class="text-sm text-red-800">
                    <strong>تحذير:</strong> بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائياً. قبل حذف حسابك، يرجى تحميل أي بيانات أو معلومات ترغب في الاحتفاظ بها.
                </p>
            </div>
        </div>
    </div>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200"
    >
        حذف الحساب
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="mr-3">
                    <h2 class="text-lg font-medium text-gray-900">
                        هل أنت متأكد من أنك تريد حذف حسابك؟
                    </h2>
                </div>
            </div>

            <p class="text-sm text-gray-600 mb-6">
                بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائياً. يرجى إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك نهائياً.
            </p>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">كلمة المرور</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                    placeholder="أدخل كلمة المرور للتأكيد"
                />
                @error('userDeletion.password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3 space-x-reverse">
                <button type="button" x-on:click="$dispatch('close')"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-medium py-2 px-4 rounded-md transition-colors duration-200">
                    إلغاء
                </button>

                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200">
                    حذف الحساب
                </button>
            </div>
        </form>
    </x-modal>
</div>
