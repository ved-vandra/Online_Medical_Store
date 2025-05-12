<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    public $connection = "mysql";

   public $table = 'images';

   protected $primaryKey = 'iid';

   public $timestamps = false;

   public function products(){
        return $this->belongsToMany(product::class);
    }
}
