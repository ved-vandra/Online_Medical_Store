<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;

    public $connection = "mysql";

   public $table = 'sale';

   protected $primaryKey = 'id';

   public $timestamps = false;


}
