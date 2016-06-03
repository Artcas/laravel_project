<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend_request extends Model
{
     protected $fillable =['auth_user_id','search_user_id'];
}
