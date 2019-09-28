<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\{Model,SoftDeletes}; //se hace la importacion de esa manera siempre y cuando se encuentre en la misma carpeta
use Str;
class Category extends Model
{

    use SoftDeletes; //voy a utilizar metodos que interactuan con mi clase se lo conoce como trait
    protected $table="categories";  //porque va relacionado a la tabla categories
   protected $connection="pgsql";
   protected $fillable=['name','descripcion'];

public static function boot()
{

    static::creating(function($model){
$model->slug=Str::slug($model->name);
$model->created_at=1;
$model->updated_at=1;
    });


    static::updating(function($model){
        $model->updated_at=1;
            });

    parent::boot();

}

//getFirtNameAttribute


//asesor empieza con get y acompañado el nombre del atributo
public function getNameAttribute($value){
//return $value.' proceso';
return Str::upper($value);

}

public function setNameAttribute($value){
    //return $value.' proceso';
    $this->attributes['name']=Str::upper($value);
    
    }
    


}
