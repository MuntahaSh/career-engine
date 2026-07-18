<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use App\Services\ImageUploadService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\ActivityService;

class CertificateController extends Controller
{
        use AuthorizesRequests;
        private ActivityService $activityService;


    public function __construct(
        protected ImageUploadService $imageService,
            ActivityService $activityService

    )
    {    $this->activityService = $activityService;
}



    public function index()
    {
        $certificates = Certificate::where(
            'user_id',
            Auth::id()
        )
        ->latest()
        ->get();


        return view(
            'certificate',
            compact('certificates')
        );
    }




public function create()
{
    return view('addCertificate', [

        'mode' => 'create',

        'certificate' => null,

    ]);
}




public function store(CertificateRequest $request)
{
    $data = $request->validated();


    if($request->hasFile('file_path'))
    {
        $data['file_path'] =
            $this->imageService->upload(
                $request->file('file_path'),
                'certificates/'.Auth::id()
            );
    }


    $data['user_id'] = Auth::id();


    $data['skills'] =
        $request->input('skills', []);


    $certificate =Certificate::create($data);
    $this->activityService->create(

    auth()->user(),

    'certificate_uploaded',

    'Uploaded certificate',

    $certificate->title,

    'cloud_upload'

);


    return redirect()
        ->route('certificates')
        ->with(
            'success',
            'Certificate created successfully'
        );
}






    public function show(
        Certificate $certificate
    )
    {

        return view(
            'viewCertificate',
            compact('certificate')
        );
    }

public function edit(Certificate $certificate)
{
    $this->authorize(
        'update',
        $certificate
    );


    return view(
        'addCertificate',
        [

            'mode'=>'edit',

            'certificate'=>$certificate,

        ]
    );
}


public function update(
    CertificateRequest $request,
    Certificate $certificate
)
{

    $this->authorize(
        'update',
        $certificate
    );


    $data = $request->validated();



    $data['skills'] =
        $request->input('skills', []);



    if($request->hasFile('file_path'))
    {
        $data['file_path'] =
            $this->imageService->replace(
                $certificate->file_path,
                $request->file('file_path'),
                'certificates/'.Auth::id()
            );
    }




    $certificate->update($data);



    return redirect()
        ->route('certificates')
        ->with(
            'success',
            'Certificate updated successfully'
        );
}





    public function destroy(
        Certificate $certificate
    )
    {

        $this->authorize(
            'delete',
            $certificate
        );



        if($certificate->file_path)
        {
            $this->imageService->delete(
                $certificate->file_path
            );
        }



        $certificate->delete();



        return redirect()
            ->route('certificates')
            ->with(
                'success',
                'Certificate deleted'
            );
    }

}
