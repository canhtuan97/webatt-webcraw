@extends('layouts.welcome')
@section('content')
<br>
<div class="row">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">giá</th>
      <th scope="col">image</th>
      <th scope="col">chi tiết</th>
      <th scope="col">comment</th>
      <th scope="col">Địa chỉ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $tt)
    <tr>
      <th scope="row">{{$tt->id}}</th>
      <td>{{$tt->name}}</td>
      <td>{{$tt->price}}</td>
      <td><img src="{{$tt->image}}" style="height: 50%"></td>
      <td><a href="{{$tt->link}}">{{$tt->link}}</a></td>
      <td>{{$tt->comment}}</td>
      <td>{{$tt->website}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


</div>
<div class="row">
  {!! $list -> links() !!}
</div>
@endsection('content')