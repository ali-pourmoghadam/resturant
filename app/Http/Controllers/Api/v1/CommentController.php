<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\UserComment;
use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct(AppHelpers $appHelpers)
    {
        $this->helper  = $appHelpers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $attributes = $request->validated();

        $this->authorize("canComment" , [Order::class , $attributes["order_id"]]);

        $comment = Comment::create($attributes);
        
        event(new UserComment($comment));

        return $this->helper->jsonResponse("comment added successfully");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return $this->helper->jsonResponse("comment deleted successfully");
    }
}
