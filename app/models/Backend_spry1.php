<?php

class Backend_spry1 extends \Eloquent {
	protected $fillable = [];

	protected $table = 'backend_spry1';
	public $timestamps = false;

	public function backend_spry2s()
	{
		return $this->hasMany('Backend_spry2','backend_spry1_id','id');
	}

	public function scopeGetSpry()
	{
		$spry1 = DB::table('backend_spry1')->get();
		$spry2 = DB::table('backend_spry2')->get();

		foreach($spry1 as $spry1_tmp) {
			$spry1_tmp->spry2 = array();
			foreach($spry2 as $spry2_tmp) {
				if($spry1_tmp->id === $spry2_tmp->backend_spry1_id) {
					array_push($spry1_tmp->spry2,$spry2_tmp);
				}
			}
		}

		return $spry1;
	}
}