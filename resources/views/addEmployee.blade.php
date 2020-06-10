  <!-- Edit Modal HTML -->
  {{-- @extends('layouts.app') --}}
  <form action="{{route('utilisateur.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
<div class="panel-body">


  <label for="">Image</label>
<input type="file" name='img' class="">
@if ($errors->has('img'))
<strong style="color: red">{{ $errors->first('img') }}</strong>
  @endif


<label for="">Location</label>
<input type="text" name="location">
   @if ($errors->has('location'))
                  <strong style="color: red">{{ $errors->first('location') }}</strong>
                    @endif


<label for="">email</label>
<input type="text" name="email">
   @if ($errors->has('email'))
                  <strong style="color: red">{{ $errors->first('email') }}</strong>
                    @endif



<label for="">phone</label>
<input type="text" name="phone">
@if ($errors->has('phone'))
<strong style="color: red">{{ $errors->first('phone') }}</strong>
  @endif
<br>

<button type="submit">Envoyé</button>

</div>



  </form>