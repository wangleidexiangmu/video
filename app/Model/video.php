<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    public $table = 'videos';
    public $timestamps = false;
    public $primaryKey = 'vid';
}
