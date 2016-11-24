<?php

namespace Ourgarage\Contacts\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = ['email', 'phone', 'name', 'message', 'status'];

    const STATUS_READED = 1;
    const STATUS_NOT_READED = 0;

}
