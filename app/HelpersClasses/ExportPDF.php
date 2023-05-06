<?php

namespace App\HelpersClasses;

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
     * @return mixed
     * @author moner khalil
     */
    private static function PDF($head , $body)
    {
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE,
            ]
        ]);
        $pdf = \PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);
        return $pdf->loadView('System.Pages.Docs.tablePrint', [
            "data" => [
                "head" => $head,
                "body" => $body,
            ]
        ])->setPaper('A4','portrait');
    }
}
