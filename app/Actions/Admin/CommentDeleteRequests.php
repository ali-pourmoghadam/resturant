<?php

namespace App\Actions\Admin;

use App\Models\Comment;
use App\Models\Resturant;


class CommentDeleteRequests {

    public function execute()
    {
            return Comment::onlyTrashed()->get();
    }
}
