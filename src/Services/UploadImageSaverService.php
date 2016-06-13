<?php

namespace Ourgarage\Contacts\Services;

use Ourgarage\Contacts\DTO\ImageResizeDTO;

class UploadImageSaverService
{
    public static function saveImage(ImageResizeDTO $dto)
    {
        $newImage = \Image::make($dto->getImage())
            ->resize($dto->getWidth(), $dto->getHeight(), function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->orientate();

        $newImage->save($dto->getPath() . $dto->getFilename(), $dto->getQuality());

        return $newImage ? true : false;
    }
}
