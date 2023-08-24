<section>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex w-full justify-between">
                <div class="flex justify-start">
                    <form method="GET" value="Active" action="/order/filter/choose_date" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @csrf
                        <!--<x-primary-button>Date</x-primary-button>-->
                        <input type="date" name="choose_date">
                        <input type="submit">
                    </form>
                </div>
                <div class="flex justify-end">
                    <form method="GET" value="Active" action="/order/filter/active" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @csrf
                        <x-primary-button>Active</x-primary-button>
                    </form>
                    <form method="GET" value="Resolved" action="/order/filter/resolved" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @csrf
                        <x-primary-button>Resolved</x-primary-button>
                    </form>
                    <form method="GET" value="All" action="/order" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @csrf
                        <x-primary-button>All</x-primary-button>
                    </form>
                </div>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                List of Orders
            </h2>
            @if(session('success'))
                        <div class="alert alert-success text-green-900">
                            {{ session('success') }}
                        </div>
            @endif
        </x-slot>

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">                    

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="border-collapse border border-slate-400 table-auto  w-full">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="border border-slate-300">{{ $order->id }}</td>
                                    <td class="border border-slate-300">{{ date('Y.m.d', strtotime($order->created_at)) }}</td>
                                    <td class="border border-slate-300">{{ $order->name }}</td>
                                    <td class="border border-slate-300">{{ $order->email }}</td>
                                    <td class="border border-slate-300">{{ $order->message }}</td>
                                    <td class="border border-slate-300">{{ $order->comment }}</td>
                                    <td class="border border-slate-300">{{ $order->status }}</td>
                                    <td class="border border-slate-300 justify-items-center flex-row items-center">
                                        <form method="GET" value="{{ $order->id }}" action="/order/{{ $order->id }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                            @csrf
                                            <x-primary-button>Edit</x-primary-button>
                                        </form>
                                        @csrf
                                    </td>
                                    <td class="border border-slate-300 justify-items-center flex-row items-center">
                                        <form method="post" action="/order/{{ $order->id }}">
                                            <x-primary-button onclick="return RemoveOrder();">Delete</x-primary-button>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    <!--
                                        <form method="DELETE" value="{{ $order->id }}" action="/order/{{ $order->id }}" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                            @csrf
                                            <x-primary-button>Delete</x-primary-button>
                                            <input type="hidden" name="_method" value="delete" />
                                        </form>
                                    -->
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        @if(session('success'))
                        <div class="alert alert-success text-green-900">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>        
    </x-app-layout>
</section>

<script>
    function RemoveOrder() {
            if (confirm("Are you shure?") == true) {
                return true;
            } else {
                return false;
            }
        }
</script>