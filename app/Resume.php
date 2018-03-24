<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Resume extends Model
{
	protected $table = 'resumes';

	protected $fillable = [
		'name', 'description', 'institution', 'date_start', 'date_end', 'resume_type'
	];

	public function getDateAttribute()
	{
		return Carbon::parse($this->date_start)->format('M Y') . " - " . Carbon::parse($this->date_end)->format('M Y');
	}
}
