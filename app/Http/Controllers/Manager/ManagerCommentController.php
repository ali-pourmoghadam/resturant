<?php

namespace App\Http\Controllers\Manager;

use App\Actions\Manager\ResturantComments;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerCommentRequest;
use App\Models\Comment;
use App\Models\ManagerComment;
use Illuminate\Http\Request;


class ManagerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResturantComments $comments)
    {
        $comments = $comments->execute();

        return view("manager.comment" ,  compact("comments"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerCommentRequest $request)
    {
        $attributes = $request->validated();

        ManagerComment::create($attributes);

        return redirect("manager/comment");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ManagerComment::destroy($id);

        return redirect("manager/comment");
    }


}
