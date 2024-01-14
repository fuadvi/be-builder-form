<?php

namespace App\Http\Controllers;

use App\Http\Repository\form\IFormRepository;
use App\Http\Requests\CreateFormRequest;
use App\Http\Traits\ResponFormater;
use Symfony\Component\HttpFoundation\Response;

class FormController extends Controller
{
    use ResponFormater;

    public function __construct(
        private readonly IFormRepository $formRepo
    )
    {
    }


    public function store(CreateFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('background')){
            $data['background'] = $request->file('background')?->store(
                'form/backgorund',
                'public'
            );
        }

        $this->formRepo->create($data);

       return $this->success(__('form.success',['message'=> "membuat form {$request->title}"]),null,Response::HTTP_OK);
    }
}
