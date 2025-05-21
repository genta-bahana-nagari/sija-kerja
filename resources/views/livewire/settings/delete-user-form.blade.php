<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('Hapus Akun') }}</flux:heading>
        <flux:subheading>{{ __('Hapus akun Anda dan semua data') }}</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('Hapus Akun') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form wire:submit="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}</flux:heading>

                <flux:subheading>
                    {{ __('Setelah akun Anda dihapus, semua data Anda akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda benar-benar ingin menghapus akun ini secara permanen.') }}
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="__('Kata Sandi')" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('Batal') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit">{{ __('Hapus Akun') }}</flux:button>
            </div>
        </form>
    </flux:modal>
</section>
