<?php

namespace App\Services;

use App\Contracts\IRandomImageService;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;

class RandomImageService extends ApiClientService implements IRandomImageService
{
    public function __construct()
    {
        parent::__construct(config('app.public_apis.random_image.url'));
    }

    /**
     * @throws GuzzleException
     */
    public function getImage(int $width, int $height, ?bool $grayScale = null, int $blur = null): Response
    {
        $random = $this->get('/' . $width . '/' . $height, ['query' => array_filter(['grayscale' => $grayScale, 'blur' => $blur])]);

        return response($random->getBody()->getContents(), $random->getStatusCode())
            ->withHeaders($random->getHeaders());
    }
}
