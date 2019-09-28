<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   // protected $table="articles";  //porque va relacionado a la tabla categories
  // protected $connection="pgsql";
public function resources() {

    return $this->hasmany(Resource::class,'article_id','id');
}



}
