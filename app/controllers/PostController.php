<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Sentry::getUser()->id;
		$posts = Post::orderBy('created_at', 'DESC')->where('user_id', '=', $id)->get();
		
		return View::make('post.index')->withPosts($posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('post.post');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, Post::$rules);

		if($validator->passes())
		{	
			$post = new Post;
            $post->title	= $input['title'];
            $post->body 	= nl2br($input['body']);
            $post->user_id  = Sentry::getUser()->id; 
			$post->save();

			return Redirect::to('post');
		}

		return Redirect::to('post')->withErrors($validator)->withInput($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$p = Post::find($id);
		$author = $p->user->first_name .' '. $p->user->last_name;
		$comments = $p->comments;
		
		return View::make('post.show')->withPost($p)->withComments($comments)->withAuthor($author);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$p = Post::find($id);
		
		return View::make('post.edit')->withPost($p);
		
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

		$validator = Validator::make($input, Post::$rules);

		if($validator->passes())
		{
			Post::find($id)->update($input);
			return Redirect::route('post.index');
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
		$p = Post::find($id)->delete();
		$comm = Comment::where('article_id', '=', $id)->delete();
		return Redirect::to('post');

	}


}
