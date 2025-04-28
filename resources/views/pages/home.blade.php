@extends('layout.app')

@section('title', 'Home')

@section('page_title', '✿˖˚ Buket Bunga Terbaru!')

@section('content')
<h1 class="text-2xl font-bold mb-4">Buket Bunga Daisy🌼</h1>

<p class="mb-4">⋆౨ৎ Buket bunga dengan bunga segar setiap hari</p>

@include('components.card', [
    'imgsrc' => 'images/buketdaisy.ppng',
    'title' => 'Buket Bunga Daisy Putih',
    'desc' => 'Buket dengan bunga yang segar dan indah.'
])

@endsection