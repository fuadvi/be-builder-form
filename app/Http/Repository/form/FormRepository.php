<?php

namespace App\Http\Repository\form;

use App\Models\Form;
use Illuminate\Support\Str;

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
}
