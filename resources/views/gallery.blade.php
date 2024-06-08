@extends('app')

@section('content')
    <h1>Загрузка файла</h1>
    <form action="{{ route('gallery') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="image">
        <button type="submit">Загрузить файл</button>
    </form>

    <div class="gallery">
        @foreach ($images as $image)
        <div class="gallery-item">
            <img src="{{ $image->image }}" onclick="openModal({{ $image->image }})" alt="Image 1">
        </div>
        @endforeach
        
        <!-- Add more images here -->
        <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="modalImg" class="modal-content">
        </div>
    </div>
@endsection