<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iteminfo extends Model
{
    use HasFactory;

    public $connection = "mysql";

    public $table = 'iteminfo';

    protected $primaryKey = 'item_id';
}
