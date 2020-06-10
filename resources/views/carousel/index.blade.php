@extends('layouts.app')
@section('css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
    



<div class="container d-flex">
 <div class="section-title dark">
    <h2>Modification de l' <span>image</span> du header</h2>
</div>

</div>
<a href="{{route('carousel.create')}}" class='btn btn-primary justify-content-center'>Ajouter</a>

<table class="table container">
    <thead>
      <tr>
        <th scope="col">Image</th>
      
        <th scope="col">Settings</th>

      </tr>
    </thead>
    <tbody>
      @foreach($carousels as $carousel)
      <tr>
      <td><img src="{{asset('storage/'.$carousel->imgCarousel)}}" alt="" class="w-25"></td>
 
      <td>
        <a href="{{route('carousel.edit' , $carousel->id)}}" class='btn btn-warning text-white'>Edit</a>
        <form action="{{route('carousel.destroy' , $carousel->id)}}" method="post">
          @csrf
          @method('delete')
          <button class='btn btn-danger my-3'>Delete</button>
        </form>
      </td>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection