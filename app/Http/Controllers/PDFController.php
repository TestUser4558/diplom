<?php

namespace App\Http\Controllers;

use App\Models\Eqip;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generate(Eqip $eqip)
    {
        $data['eqip'] = $eqip;

        $pdf = Pdf::loadView('user/pdf/doc', $data);

        return $pdf->download('doc.pdf');
    }
}
