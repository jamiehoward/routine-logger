<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
	use SoftDeletes;

	public $guarded = [];

    public function routine()
    {
    	return $this->belongsTo(Routine::class);
    }
}
