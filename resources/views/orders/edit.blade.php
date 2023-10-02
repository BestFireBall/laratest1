<section>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Editing order
            </h2>
        </x-slot>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{ route('order.update') }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8">                        
                    @csrf
                        <div class="mb-6">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $order->name)"  required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('name', $order->email)"  autofocus autocomplete="email" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="message" :value="__('Message')" />
                            <x-text-input id="message" name="message" type="text" class="mt-1 block w-full h-24" :value="old('name', $order->message)"  required autofocus autocomplete="message" />
                            <x-input-error class="mt-2" :messages="$errors->get('message')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="comment" :value="__('Comment')" />
                            <x-text-input id="comment" name="comment" type="text" class="mt-1 block w-full" :value="old('name', $order->comment)" required autofocus autocomplete="comment" />
                            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                        <input type="hidden" name="id" value="{{$order->id}}" />
                        <input type="hidden" name="status" value="Resolved" />
                        <input type="hidden" name="_method" value="put" />
                    </form>

                </div>
            </div>
        </div>        
    </x-app-layout>
</section>
