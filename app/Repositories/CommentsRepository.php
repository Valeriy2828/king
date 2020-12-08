<?php
namespace App\Repositories;

use App\Models\Comment;

class CommentsRepository extends Repository
{

    public  function __construct(Comment $comments){
        $this->model = $comments;
    }
}
