@extends('layouts.penjual')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-3xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-2">
        <i class="fas fa-user-circle text-3xl"></i> EDIT PROFIL
    </h1>

    <form class="space-y-6">
        <div>
            <label class="block mb-1 font-semibold">NAMA:</label>
            <input type="text" value="Bloomify" class="w-full bg-purple-100 rounded-md p-2" readonly>
        </div>

        <div>
            <label class="block mb-1 font-semibold">NO. HP:</label>
            <input type="text" value="0899 0088 9966" class="w-full bg-purple-100 rounded-md p-2" readonly>
        </div>

        <div>
            <label class="block mb-1 font-semibold">EMAIL:</label>
            <input type="email" value="bloomify@gmail.com" class="w-full bg-purple-100 rounded-md p-2" readonly>
        </div>

        <div>
            <label class="block mb-1 font-semibold">ALAMAT:</label>
            <textarea class="w-full bg-purple-100 rounded-md p-2" rows="3" readonly>Batam Center</textarea>
        </div>

        <div class="text-center">
            <button type="button" class="bg-green-400 hover:bg-green-500 text-white font-semibold py-2 px-6 rounded-md">
                SIMPAN
            </button>
        </div>
    </form>
</div>
@endsection
