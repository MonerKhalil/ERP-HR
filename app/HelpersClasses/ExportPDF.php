<?php

namespace App\HelpersClasses;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Response;

class ExportPDF
{
    public static function viewPDF(array $head ,mixed $body){
        return self::PDF($head,$body)->stream();
    }

    public static function downloadPDF(array $head ,mixed $body,$fileName = null): Response
    {
        $fileName = is_null($fileName) ? "document".time() : $fileName;
        $fileName .= ".pdf";
        return self::PDF($head,$body)->download($fileName);
    }

    /**
     * @param $head
     * @param $body
     * @return Dompdf|\Barryvdh\DomPDF\PDF
     * @author moner khalil
     */
    private static function PDF($head , $body): Dompdf|\Barryvdh\DomPDF\PDF
    {
        return PDF::loadView('', [
            "data" => [
                "head" => $head,
                "body" => $body,
            ]
        ])->setPaper('a4');
    }
}
