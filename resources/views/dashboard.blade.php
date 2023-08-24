<section>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">                    

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Dear, {{ $user->name }}, please fill your message to us.
                        @if(session('success'))
                        <div class="alert alert-success text-green-900">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('order.store') }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @csrf
                    <!--@method('patch')-->
                        <div class="mb-6">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('name', $user->email)" autofocus autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="message" :value="__('Message')" />
                            <x-text-input id="message" name="message" type="text" class="mt-1 block w-full" required autofocus autocomplete="message" />
                            <x-input-error class="mt-2" :messages="$errors->get('message')" />
                        </div>

                        <input type="hidden" value="Active">
                        <input type="comment" value="">

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
<!--
                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
-->
                        </div>
                    </form>

                </div>
            </div>
        </div>        
    </x-app-layout>
</section>
