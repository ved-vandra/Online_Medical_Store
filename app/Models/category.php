<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class category extends Model
{
   
   use Sortable;

   public $connection = "mysql";

   public $table = 'category';

   protected $primaryKey = 'cid';

   public $timestamps = false;

   
   public $sortable = 
   [
      'cid',
      'cname',
      'sdesc'
   ];
   public function scates(){
      return $this->belongsTo(scate::class);
   }
}