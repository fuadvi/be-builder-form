<?php

namespace App\Http\Repository\form;

interface IFormRepository
{
    public function create(array $data): void;
}
