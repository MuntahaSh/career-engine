<?php

namespace App\View\Components\certificate;

use App\Models\Certificate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewCertificate extends Component
{

    public Certificate $certificate;


    public function __construct(
        Certificate $certificate
    )
    {
        $this->certificate = $certificate;
    }


    public function render(): View|Closure|string
    {
        return view('components.certificate.view-certificate');
    }
}
