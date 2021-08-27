<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $table = 'catalog';
}
