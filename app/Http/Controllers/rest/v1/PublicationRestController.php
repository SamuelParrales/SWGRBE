<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationRestController extends Controller
{
    public function update($id, Request $request){

        $user = Auth::user();
        $publication = Publication::findOrFail($id);
        if($publication->user_id != $user->id){
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }
        // return $id;
        $publication->content = $request->content;

        return $publication->save();
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $publication = Publication::findOrFail($id);
        if($publication->user_id != $user->id){
            throw new HttpResponseException(
                response()->json(['error' => 'Forbidden.'], JsonResponse::HTTP_FORBIDDEN)  //http 403
            );
        }

        return $publication->delete();
    }
}
