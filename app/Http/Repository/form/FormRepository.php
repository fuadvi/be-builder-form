<?php

namespace App\Http\Repository\form;

use App\Models\Form;

class FormRepository implements IFormRepository
{
    public function __construct(private Form $form)
    {
    }


    public function create(array $data): void
    {
        $data['user_id'] = auth()->user()->id;
        $this->form->create($data);
    }

    public function addComponent(array $data, Form $form): void
    {
        $form->fields()->create([
            'component' => json_encode($data)
        ]);
    }

    public function getById(int $formId): Form
    {
        return $this->form->findOrFail($formId);
    }


}
