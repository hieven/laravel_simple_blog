<?php

class Post extends Eloquent
{
	protected $fillable = array('title', 'body');

	public static $rules = array(
        'title'	=> 'required',
        'body'	=> 'required',
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function comments()
	{
		return $this->hasMany('Comment', 'article_id');
	}

	public function getHumanTime()
	{
		if($this->created_at->diffInDays() > 30){
            return 'created at ' . $this->created_at->toFormattedDateString();
        } else {
            return 'created ' . $this->created_at->diffForHumans();
        }
	}
}