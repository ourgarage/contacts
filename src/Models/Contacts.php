<?php

namespace Ourgarage\Contacts\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['email', 'phone', 'name', 'message'];

}
