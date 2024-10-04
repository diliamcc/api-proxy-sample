<?php

namespace App\Http\Controllers;

use App\Contracts\IRandomImageService;
use App\Http\Requests\RandomImageRequest;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function __construct(private readonly IRandomImageService $randomImageService) {}

    public function randomImage(RandomImageRequest $request): Response
    {
        try {
            $data = $request->validated();
            $width = Arr::get($data, 'width') ?? 200;
            $height = Arr::get($data, 'height') ?? 200;
            $grayScale = Arr::get($data, 'grayScale');
            $blur = Arr::get($data, 'blur');

            return $this->randomImageService->getImage($width, $height, $grayScale, $blur);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
