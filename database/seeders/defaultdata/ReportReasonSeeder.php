<?php

namespace Database\Seeders\defaultdata;

use App\Models\ReportReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reportReason = new ReportReason();
        $reportReason->reason = "Engañoso o fraude.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "Contenido sexual inapropiado.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "Ofensivo.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "Violencia.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "El anunciante se hace pasar por otra persona.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "Candidato o tema político.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "Contenido prohibido.";
        $reportReason->save();

        $reportReason = new ReportReason();
        $reportReason->reason = "Otros.";
        $reportReason->save();
    }
}
