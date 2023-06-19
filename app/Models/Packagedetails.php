<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packagedetails extends Model
{
    protected $table = 'packagesdetails';

    protected $fillable = ['name',
    'price'];
}
