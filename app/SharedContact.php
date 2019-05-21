<?php

namespace App;

use DB;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

class SharedContact extends Model
{
    /**
     * @var string
     */
    protected $table = 'contacts_shared';
}
