<x-app-layout>
 <x-slot name="header">
 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
 {{ __('Food') }}
 </h2>
 </x-slot>
 <div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 <div class="mb-10">
 <a href="{{ url('/food/create') }}" class="bg-green-500 hover:bggreen-700 text-white font-bold py-2 px-4 rounded">
 + Create Food
 </a>
 </div>
 <div class="bg-white">
 <table class="table-auto w-full">
 <thead>
 <tr>
 <th class="border px-6 py-4">ID</th>
 <th class="border px-6 py-4">Name</th>
 <th class="border px-6 py-4">Price</th>
 <th class="border px-6 py-4">Rate</th>
 <th class="border px-6 py-4">Types</th>
 <th class="border px-6 py-4">Action</th>
 </tr>
 </thead>
 <tbody>
 @forelse($food as $item)
 <tr>
 <td class="border px-6 py-4">{{ $item->id }}</td>
 <td class="border px-6 py-4 ">{{ $item->food_name 
}}</td>
 <td class="border px-6 py-4">{{ number_format($item->price) }}</td>
 <td class="border px-6 py-4">{{ $item->rate }}</td>
 <td class="border px-6 py-4">{{ $item->types }}</td>
 <td class="border px-6 py- text-center">
 <a href="{{ url('/food/edit', $item->id) }}"
class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 
rounded">
 Edit
 </a>
<form action="{{ url('/food/destroy', $item->id) 
}}" method="POST" class="inline-block">
 @csrf
<button type="submit" class="bg-red-500 
hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
 Delete
 </button>
 </form>
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
 {{ $food->links() }}
 </div>
 </div>
 </div>
</x-app-layout>
Tambahkan file resources/views/food/create.blade.php (buat foldernya jika perlu) lalu 
gunakan kode berikut
<x-app-layout>
 <x-slot name="header">
 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
 {!! __('Food &raquo; Create') !!}
 </h2>
 </x-slot>
 <div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 <div>
 @if ($errors->any())
 <div class="mb-5" role="alert">
 <div class="bg-red-500 text-white font-bold rounded-t px-4 py2">
 There's something wrong!
 </div>
<div class="border border-t-0 border-red-400 rounded-b bg-red100 px-4 py-3 text-red-700">
 <p>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </p>
 </div>
 </div>
 @endif
 <form class="w-full" action="{{ url('/food/store') }}" method="post"
enctype="multipart/form-data">
 @csrf
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full px-3">
 <label class="block uppercase tracking-wide text-gray-700 
text-xs font-bold mb-2" for="grid-last-name">
 Name
 </label>
<input value="{{ old('food_name') }}" name="food_name"
class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200
rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray500" id="grid-last-name" type="text" placeholder="Food Name">
 </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full px-3">
 <label class="block uppercase tracking-wide text-gray-700 
text-xs font-bold mb-2" for="grid-last-name">
 Image
 </label>
<input name="picture_path" class="appearance-none block wfull bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight 
focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name"
type="file" placeholder="Food Image">
 </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full px-3">
 <label class="block uppercase tracking-wide text-gray-700 
text-xs font-bold mb-2" for="grid-last-name">
 Description
 </label>
<textarea name="description" class="appearance-none block 
w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leadingtight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name"
type="text" placeholder="Food Description">{{ old('description') }}</textarea>
 </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full px-3">
 <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
 Ingredients
 </label>
<input value="{{ old('ingredients') }}" name="ingredients"
class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 
rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray500" id="grid-last-name" type="text" placeholder="Food Ingredients">
 <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, contoh: Bawang Merah, Paprika, Bawang Bombay, Timun</p>
 </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full md:w-1/2 px-3">
 <label class="block uppercase tracking-wide text-gray-700 
text-xs font-bold mb-2" for="grid-last-name">
 Price
 </label>
 <input value="{{ old('price') }}" name="price"
class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 
rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray500" id="grid-last-name" type="number" placeholder="Food Price">
 </div>
<div class="w-full md:w-1/2 px-3">
 <label class="block uppercase tracking-wide text-gray-700 
text-xs font-bold mb-2" for="grid-last-name">
 Rate
 </label>
<input value="{{ old('rate') }}" name="rate"
class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 
rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray500" id="grid-last-name" type="number" step="0.01" max="5" placeholder="Food Rate">
 </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full px-3">
 <label class="block uppercase tracking-wide text-gray-700 
text-xs font-bold mb-2" for="grid-last-name">
 Types
 </label>
<input value="{{ old('types') }}" name="types"
class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 
rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray500" id="grid-last-name" type="text" placeholder="Food Types">
 <p class="text-gray-600 text-xs italic">Dipisahkan dengan 
koma, contoh: recommended,popular,new_food</p>
 </div>
 </div>
 <div class="flex flex-wrap -mx-3 mb-6">
 <div class="w-full px-3 text-right">
 <button type="submit" class="bg-green-500 hover:bg-green700 text-white font-bold py-2 px-4 rounded">
 Save Food
 </button>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
</x-app-layout>
