<?php

namespace App\Http\Controllers\mvc;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->publication_id = $request->publication_id;
        $comment->user_id =   Auth::user()->id;

        // return $request;
        $comment->save();
        return redirect(route('publication.show',$request->publication_id));
    }

    public function update($id,Request $request){

        $comment = Comment::findOrFail($id);
        $user = Auth::user();
        if($comment->user_id != $user->id){ //No cuenta con los permisos
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }
        $comment->content = $request->content;
        $comment->save();
        return redirect(route('publication.show',$comment->publication_id));
    }
}
