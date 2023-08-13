<?php

namespace App\Http\Controllers\mvc;
use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $publications = Publication::orderBy('updated_at','desc')->paginate(5);
        // return $publications;
        return view('publication.index',compact('publications'));
    }

    public function store(Request $request){
        $publication = new Publication();
        $publication->user_id =   Auth::user()->id;
        $publication->content = $request->content;
        $publication->save();

        // return $publications;
        return redirect(route('publication.index'));
    }

    public function show($id){
        $publication = Publication::findOrFail($id);
        return view('publication.show',compact('publication'));

    }

}
