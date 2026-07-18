<?php
namespace App\View\Components\certificate;

use App\Models\Certificate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddCertificate extends Component
{

    public string $mode;

    public ?Certificate $certificate;


    public function __construct(
        string $mode = 'create',
        ?Certificate $certificate = null
    )
    {
        $this->mode = $mode;

        $this->certificate = $certificate;
    }



    public function render(): View|Closure|string
    {
        return view(
            'components.certificate.add-certificate'
        );
    }

}
