<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class scate extends Model
{
    use HasFactory;
    
    use Sortable;

    public $connection = "mysql";

    public $table = 'scate';

    protected $primaryKey = 'sid';

    public $timestamps = false;

    public $sortable = 
    [
        'sid',
        'sname',
        'cname',
        'sdesc'
    ];
    public function products(){
        return $this->belongsToMany(product::class);
    }
    public function category(){
        return $this->hasMany(category::class);
    }
}
