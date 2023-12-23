<x-app-layout>
 <x-slot name="header">
 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
 {{ __('Dashboard') }}
 </h2>
 </x-slot>
 <div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 <div class="bg-white">
 <table class="table-auto w-full">
 <thead>
 <tr>
 <th class="border px-6 py-4">ID</th>
 <th class="border px-6 py-4">Waktu</th>
 <th class="border px-6 py-4">Item</th>
 <th class="border px-6 py-4">Pemesan</th>
 <th class="border px-6 py-4">Status</th>
 <th class="border px-6 py-4">Action</th>
 </tr>
 </thead>
 <tbody>
 @forelse($transaction as $item)
 <tr>
 <td class="border px-6 py-4">{{ $item->id }}</td>
 <td class="border px-6 py-4">
 {{ \Carbon\Carbon::parse($item->created_at)
 ->format('Y-m-d H:i:s') }}
 </td>
<td class="border px-6 py-4">
 {{ number_format($item->quantity) }} 
{{ $item->food->food_name }}<br/>
 Total: {{ number_format($item->total) }}
 </td>
<td class="border px-6 py-4 ">
 {{ $item->user->name }}<br/>
 {{ $item->user->address }} No 
 {{ $item->user->house_number }}<br/>
 {{ $item->user->city }}
 </td>
<td class="border px-6 py-4 ">
 {{ $item->status }}
 </td>
<td class="border px-6 py- text-center">
 @if($item->status=='ORDER')
<form action="{{ url('/transaction/bayar', $item->id) }}" method="POST" class="inline-block">
 @csrf
<button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
 Bayar
 </button>
 </form>
<form action="{{ url('/transaction/cancel', $item->id) }}" method="POST" class="inline-block">
 @csrf
<button type="submit" class="bg-red-500
 hover:bg-red-700 text-white font-bold 
 py-2 px-4 mx-2 rounded inline-block">
 Batal
 </button>
 </form>
@endif
 </td>
 </tr>
 @empty
 <tr>
 <td colspan="6" class="border text-center p-5">
 Data Tidak Ditemukan
 </td>
 </tr>
 @endforelse
 </tbody>
 </table>
 </div>
 <div class="text-center mt-5">
 {{ $transaction->links() }}
 </div>
 </div>
 </div>
</x-app-layout>
<script>
window.onload = function(){
 setTimeout(function(){
 window.location.reload(1);
 }, 60000);
}
</script>
