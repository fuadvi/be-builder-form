<?php

namespace App\Http\Controllers;

use App\Http\Repository\form\IFormRepository;
use App\Http\Requests\addFormFieldRequest;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\CreateFormRequest;
use App\Http\Resources\FormResource;
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

    public function addFormField(addFormFieldRequest $request,$formId)
    {
        $form = $this->formRepo->getById($formId);
        $this->formRepo->addComponent($request->validated(),$form);
        return $this->success(__('form.success',['message'=> "menambahkan field"]),null,Response::HTTP_OK);
    }

    public function show(string $uuid)
    {
        $form = $this->formRepo->getByUuid($uuid);
        return $this->success(
            __('form.success',['message'=> "detail form"]),
            new FormResource($form),
            Response::HTTP_OK
        );
    }

    public function processAnswer(AnswerRequest $request, string $uuid)
    {
        $form = $this->formRepo->getByUuid($uuid);
        $this->formRepo->addAnswer($request->validated(),$form);
        return $this->success(
            __('form.success',['message'=> "add answer"]),
            null,
            Response::HTTP_OK
        );
    }

    public function index()
    {
        $forms = $this->formRepo->getAll();
        return $this->success(
            __('form.success',['message'=> "list form"]),
            FormResource::collection($forms),
            Response::HTTP_OK
        );
    }
}
