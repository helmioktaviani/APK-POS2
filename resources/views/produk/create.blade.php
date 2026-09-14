@extends('layouts.app') {{-- Sesuaikan dengan nama file layout Anda --}}

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-white">
            <h4 class="mb-0">Tambah Produk</h4>
        </div>
        <div class="card-body">
            
            {{-- PENTING: Harus ada atribut enctype="multipart/form-data" agar file foto bisa dikirim --}}
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                
                @include('produk._form')

            </form>

        </div>
    </div>
</div>
@endsection
