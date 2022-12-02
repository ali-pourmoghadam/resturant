<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class ManagerCommentResponseController extends Controller
{

    public function destroy(Comment $comment)
    {
        $comment->update(["status" => 1]);

        $comment->delete();

        return redirect("manager/comment");
    }


    public function confirm(Comment $comment){

        $comment->update(["status" => 2]);

        return redirect("manager/comment");
    }
}
