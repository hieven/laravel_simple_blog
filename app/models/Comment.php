<?php

class Comment extends Eloquent
{
	protected $fillable = array('body');

	public static $rules = array(
        'body'	=> 'required',
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	public function getArticle()
	{
		return $this->belongsTo('Post', 'article_id');
	}

	public function userName()
	{
		$user = User::find($this->user_id);
		return $user->first_name .' '. $user->last_name;
	}

	public function getHumanTime()
	{
		if($this->created_at->diffInDays() > 30){
            return 'reply at ' . $this->created_at->toFormattedDateString();
        } else {
            return 'reply ' . $this->created_at->diffForHumans();
        }
	}
}