<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TableCustomExport implements FromView
{
    private $head,$body,$blade;
    public function __construct($head,$body,$blade)
    {
        $this->head = $head;
        $this->body = $body;
        $this->blade = $blade;
    }

    public function view(): View
    {
        return \view($this->blade,[
            "data" => [
                "head" => $this->head,
                "body" => $this->body,
            ],
        ]);
    }
}
