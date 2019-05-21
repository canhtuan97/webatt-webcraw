<?php

namespace App\Http\Controllers;
use App\dienthoai;
use App\ipad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Show extends Controller
{
   	public function showTrangChu()
   	{
   		$hot = DB::table('data')->orderBy('price', 'desc')->take(4)->get();
         return view('trangchu',['hot'=>$hot]);
   		
   	}
      //min-max 
   	public function minMax(Request $request){
   		$min = $request->min;
   		$max = $request->max;
   		
   		$list = DB::table('data')->whereBetween('price', [$min, $max])->paginate(4);
         if (count($list)) {
             return view('min-max',['list'=>$list]);
         }else{
            return back();
         }
        
   	}
      
     

   	public function timkiemPost(Request $request){
   		$key = $request->key;
   		$list = DB::table('data')->where('name','like',"%$key%")->paginate(4);
         

   		if (count($list)) {
            return view('timkiem',['list'=>$list]);
         }else{
            return back();
         }
   	  
   		
        
   	}
   	public function timkiemGet(){
   		return view('trangchu');
   	}
      // max  dien thoai
   	public function max(){
   		$list = DB::table('data')->where('type','like',"dienthoai")->orderBy('price', 'desc')->paginate(5);

   		return view('max',['list'=>$list]);
   	}
      //max ipad
      public function maxIpad(){
         
         $list = DB::table('data')->where('type','like',"ipad")->orderBy('price', 'desc')->paginate(5);
         return view('max_ipad',['list'=>$list]);
      }

      //min dien thoai
   		public function min(){
   		
         $list = DB::table('data')->where('type','like',"dienthoai")->orderBy('price', 'asc')->paginate(5);
   		return view('min',['list'=>$list]);
   	}
      //max ipad
      public function minIpad(){
        $list = DB::table('data')->where('type','like',"ipad")->orderBy('price', 'asc')->paginate(5);

         return view('min_ipad',['list'=>$list]);
      }
}
