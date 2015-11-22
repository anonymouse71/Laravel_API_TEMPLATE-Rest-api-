<?php

class Lesson extends \Eloquent {
	protected $fillable = ['title', 'body'];

	//protected $hidden = ['created_at'];
	protected $table= 'lessons';
	public function tags()
	{
		return $this->belongsToMany('Tag');
	}
}