<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Tampilan')" :subheading="__('Atur tampilan untuk aplikasi ini')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('Terang') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('Gelap') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('Tampilan Sistem') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</section>
