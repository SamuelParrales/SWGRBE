<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentRestController extends Controller
{
    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $user = Auth::user();
        if($comment->user_id != $user->id){ //No cuenta con los permisos
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }
        return $comment->delete();
    }
}
