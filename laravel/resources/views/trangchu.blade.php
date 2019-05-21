@extends('layouts.welcome')
@section('content')
    <div class="container">

<div class="row">
    <h1><b>Hot</b></h1>
    
</div>
    <div class="row" >
    <div class="col-md-5 col-lg-5" >
      <!-- artigo em destaque -->
      
      <div class="featur7ued-article">
        <a href="#">
          <img src="{{$hot[0]->image}}" alt="" class="thumb">
        </a>
        <div class="block-title">
          <h2>{{$hot[0]->name}}</h2>
          <p class="by-author"><small>{{$hot[0]->price}}</small></p>
          <a href="{{$hot[0]->link}}"><button type="button" class="btn btn-info">Chi tiết</button>
        </div>
      </div>
      
      <!-- /.featured-article -->
    </div>
    <div class="col-md-2" >
      <div style="margin: 50px"></div>
    </div>
    <div class="col-md-5 col-lg-5">
      <ul class="media-list main-list" >
        <li class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="{{$hot[1]->image}}" alt="..." style="width: 50%;height: 50%">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><b>{{$hot[1]->name}}</b></h4>
            <p class="by-author">{{$hot[1]->price}}đ</p>
            <p class="by-author">{{$hot[1]->comment}}</p>
            <p class="by-author">Địa chỉ:{{$hot[1]->website}}</p>
            <a href="{{$hot[1]->link}}"><button type="button" class="btn btn-info">Chi tiết</button></a>
          </div>
        </li>
        <br>
         <li class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="{{$hot[2]->image}}" alt="..." style="width: 80%;height: 80%">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><b>{{$hot[2]->name}}</b></h4>
            <p class="by-author">{{$hot[2]->price}}đ</p>
            <p class="by-author">{{$hot[2]->comment}}</p>
            <p class="by-author">Địa chỉ:{{$hot[2]->website}}</p>
            <a href="{{$hot[2]->link}}"><button type="button" class="btn btn-info">Chi tiết</button></a>
          </div>
        </li>
        <br>
         <li class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="{{$hot[3]->image}}" alt="..." style="width: 50%;height: 50%">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><b>{{$hot[3]->name}}</b></h4>
            <p class="by-author">{{$hot[3]->price}}đ</p>
            <p class="by-author">{{$hot[3]->comment}}</p>
            <p class="by-author">Địa chỉ:{{$hot[3]->website}}</p>
            <a href="{{$hot[3]->link}}"><button type="button" class="btn btn-info">Chi tiết</button></a>
          </div>
        </li>
       
      </ul>
    </div>
  </div>
</div>
@endsection('content')