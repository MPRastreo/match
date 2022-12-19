<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory, Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'quotation';
    public $timestamps = false;
}
