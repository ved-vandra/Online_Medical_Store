<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    public $connection = "mysql";

    public $table = 'orders';

    protected $primaryKey = 'order_id';

}
