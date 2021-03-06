<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use App\Model\Question;
use App\Http\Resources\ReplyResource;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        //

        return ReplyResource::collection($question->replies);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,Request $request)
    {
        //
        

        $reply = $question->replies()->create($request->all());

        return response()->json(['reply' => $question->replies()->find($reply->id)],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,Reply $reply)
    {
        //
       return new ReplyResource($reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Reply $reply,Request $request)
    {
        //
       
        $reply->update($request->except(['id']));

        return response()->json('Updated',201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question,Reply $reply)
    {
        //

        $reply->delete($reply);

        return response()->json(null,203);
    }
}
