<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;

class Familys extends Model
{
    use HasFactory,Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'familys';
    public $timestamps = false;
}
