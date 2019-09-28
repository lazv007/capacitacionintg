<?php
Route::group(['prefix'=>'admin'],function(){


Route::get('/saludar',function(){
    return "Holis";
});
Route::get('/saludar-p/{name}',function($name){
    return "Holis : ".$name;
});
Route::get('/saludar-p/{name?}',function($name="vacio"){ //variable que puede ir como no
    return "Holis : ".$name;
});
Route::get('/sumar/{op1}/{op2?}',function($op1,$op2=1){ //variable que puede ir como no
    return $op1+$op2;
});
Route::get('/sumar-t/{op1}/{op2}/{op3?}',function($op1,$op2,$op3=1){ //variable que puede ir como no
    return $op1+$op2+$op3;
});

Route::get('validador/{num}',function($num){
    return $num;
})->where (['num'=>'[A-Z][0-9]+']);

Route::get('validador2/{num}/{num2}',function($num,$num2){
    return $num+$num2;
})->where (['num'=>'[0-9]+','num2'=>'[0-9]+']);

});