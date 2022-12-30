<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;

class ClinicalHistorie extends Model
{
    use HasFactory, Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'clinical_historie';
    public $timestamps = false;
}
