<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class product extends Model
{
    use HasFactory;

    use Sortable;

    public $connection = "mysql";

    public $table = 'product';

    protected $primaryKey = 'pid';

    public $timestamps = false;
    
   public $sortable = 
   [
        'id',
        'sku',
        'price',
        'quan',
        'stock',
   ];
   public function subcate(){
       return $this->hasMany(scate::class);
   }
   public function image(){
       return $this->hasMany(images::class);
   }
   
}
