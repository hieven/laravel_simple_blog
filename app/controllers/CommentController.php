<?php

class CommentController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$input = Input::all();

		$validator = Validator::make($input, Comment::$rules);

		if($validator->passes())
		{
			$comment = new Comment;
			$comment->body = $input['body'];
			$comment->user_id = Sentry::getUser()->id;
			$comment->article_id = $id;
			$comment->save();

		}
		return Redirect::to('/post/'.$id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comm = Comment::find($id);
		
		return View::make('comment.edit')->withComm($comm);
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	
		$input = array_except(Input::all(), '_method');

		$validator = Validator::make($input, Comment::$rules);

		if($validator->passes())
		{
			Comment::find($id)->update($input);
			return Redirect::route('post.show', Comment::find($id)->getArticle->id);
		}

		return Redirect::back()->withErrors($validator);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article_id = Comment::find($id)->getArticle->id;
		$comm = Comment::find($id)->delete();
		return Redirect::route('post.show', $article_id);

	}



}
