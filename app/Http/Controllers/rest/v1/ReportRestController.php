<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\rest\v1\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportRestController extends Controller
{
    public function store(ReportRequest $request)  //Is public
    {
        $report = new Report();
        $report->report_reason_id = $request->report_reason_id;
        $report->product_id = $request->product_id;
        $report->description = $request->description;

        $report->save();
    }
    public function destroy($id)  //Only Moderator and Admin
    {
        $this->middleware(['auth','verified','profile:Moderator,Admin']);
        $report = Report::findOrFail($id);
        $report->delete();
    }
}
