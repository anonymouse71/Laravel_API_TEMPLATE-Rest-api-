<?php

class Tag extends Eloquent {

	protected $table= 'tags';
	public function lessons()
	{
		return $this->belongsToMany('Lesson');
	}

}