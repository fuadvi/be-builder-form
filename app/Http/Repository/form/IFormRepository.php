<?php

namespace App\Http\Repository\form;

use App\Models\Form;

interface IFormRepository
{
    public function create(array $data): void;

    public function addComponent(array $data, Form $form): void;
    public function getById(int $formId): Form;
    public function getByUuid(string $uuid);
    public function addAnswer(array $data,Form $form);
}
