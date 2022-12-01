<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\CommentDeleteRequests;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsManagementController extends Controller
{
    
    public function showDeleteRequests(CommentDeleteRequests $comments)
    {
        $comments = $comments->execute();

        return view("admin.commentDeleteRequest" , compact("comments"));
    }

    public function forceDeleteRequests(Comment $comment)
    {

        $comment->forceDelete();

        return redirect("/admin/comment/deletes");
    }


    public function restoreDeleteRequests(Comment $comment)
    {

        $comment->restore();

        $comment->update(["status" => 0]);

        return redirect("/admin/comment/deletes");
    }


}
