<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Routine extends Model
{
	use SoftDeletes;

	public $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function entries()
    {
    	return $this->hasMany(Entry::class)->orderByDesc('created_at');
    }
}
