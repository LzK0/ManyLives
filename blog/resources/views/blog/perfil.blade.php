@extends('layouts.main')

@section('content')
<h3 class="text-white">teste do perfil</h3>

@auth
<form action="upload/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit" value="enviar">
</form>
@endauth
@endsection