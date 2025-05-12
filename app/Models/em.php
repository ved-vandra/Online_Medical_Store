<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\em as Authenticable;
use Illuminate\Notifications\Notifiable;

class em extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable=[
        'name',
        'email'
    ];
    public $connection = "mysql";

    public $table = 'em';

    protected $primaryKey = 'id';

    public $timestamps = false;

}
