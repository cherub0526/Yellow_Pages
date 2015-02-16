<?php

class Backend_spry2 extends \Eloquent {
	protected $fillable = [];

	protected $table = 'backend_spry2';
	public $timestamps = false;

	public function backend_spry1()
	{
		return $this->belongsTo('Backend_spry1');
	}
}