<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TableCustomExport implements FromView
{
    private $head,$body;
    public function __construct($head,$body)
    {
        $this->head = $head;
        $this->body = $body;
    }

    public function view(): View
    {
        return \view("",[
            "data" => [
                "head" => $this->head,
                "body" => $this->body,
            ],
        ]);
    }
}
