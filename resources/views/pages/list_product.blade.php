@extends('layout.list')
@section('title', 'list Produk Bloomify')
@section('content')

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Produk</th>
  </thead>
  <tbody>
    @foreach($data as $post)
    <tr>
      <td>{{ $post['id'] }}</td>
      <td>{{ $post['produk'] }}</td>
      <!--Data lainnya -->
    @endforeach
  </tbody>
</table>
@endsection