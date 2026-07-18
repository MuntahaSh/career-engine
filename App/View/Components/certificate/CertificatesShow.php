<?php

namespace App\View\Components\certificate;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CertificatesShow extends Component
{
    public $certificates;


    public function __construct($certificates)
    {
        $this->certificates = $certificates;
    }


    public function render(): View|Closure|string
    {
        return view('components.certificate.certificates-show');
    }
}
