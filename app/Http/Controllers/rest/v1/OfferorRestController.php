<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\rest\v1\OfferorRequest;
use App\Models\Ban;
use App\Models\Offeror;
use App\Models\User;
use Illuminate\Http\Request;

class OfferorRestController extends Controller
{

    public function ban($id, Request $request)
    {
        $this->middleware(['auth', 'verified', 'profile:Moderator,Admin']);
        $days = $request->input('days',null);
        $offeror = Offeror::findOrFail($id);

        $date = date("Y-m-d H:i:s");
        $ban = new Ban();
        $ban->days = $days;
        $ban->user_id =  $offeror->user_id;
        $ban->created_at = $date;

        $ban->save();

        $offeror->banned_at = $date;
        $offeror->save();

        $offeror->user->sendEmailBannedUser($days);
        return $offeror;
    }

    public function unban($id)
    {
        $this->middleware(['auth', 'verified', 'profile:Moderator,Admin']);
        $offeror = Offeror::findOrFail($id);
        $offeror->banned_at = null;
        $offeror->save();
    }
}
