<?php

namespace App\Http\Repository\form;

use App\Models\Form;
use App\Models\TeamUser;

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

    public function getByUuid(string $uuid)
    {
        return $this->form
            ->with('fields')
            ->whereUuid($uuid)
            ->first();
    }

    public function addAnswer(array $data, Form $form): void
    {
        $form->answers()->create([
            'answer' => json_encode(array_values($data))
        ]);
    }

    public function getAll()
    {
        return $this->form
            ->whereHas('team.member',function ($query)
            {
                return $query->where('user_id',auth()->user()->id);
            })
            ->orderByDesc('id')
            ->get();
    }


}
