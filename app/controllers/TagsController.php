<?php

use RestApi\Transformers\TagTransformer;

class TagsController extends ApiController {

	protected $tagTransformer;

	function __construct(TagTransformer $tagTransformer)
	{
		$this->tagTransformer = $tagTransformer;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lessonId = null)
	{
		$tags = $this->getTags($lessonId);

		return $this->respond([
			'data' => $this->tagTransformer->transformCollection($tags->all())
		]);
	}

	private function getTags ($lessonId){
		//return  $lessonId ? Lesson::find($lessonId)->tags : Tag::all();
		return $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tag = Tag::find($id);

		if (! $tag ) {

			return $this->respondNotFound('Tag Not Exist');

		}

		return $this->respond([
			'data' => $this->tagTransformer->transform($tag)
		]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
