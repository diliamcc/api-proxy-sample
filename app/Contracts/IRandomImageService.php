<?php

namespace App\Contracts;

use Symfony\Component\HttpFoundation\Response;

interface IRandomImageService {
    public function getImage(int $width, int $height): Response;
}