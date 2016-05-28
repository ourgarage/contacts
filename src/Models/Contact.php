<?php

namespace Ourgarage\Contacts\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['text', 'sort'];

}
