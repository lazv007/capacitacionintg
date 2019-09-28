<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
  //  protected $table="resources";  //porque va relacionado a la tabla categories
  // protected $connection="pgsql";
  public function article(){
    return $this->belongTo(Article::class,'article_id','id');
}

}
