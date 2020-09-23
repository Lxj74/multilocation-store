<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait FileHandler
{
    /**
     * @param  UploadedFile|null $file
     * @return null|string Stored file name, null if uploaded file is null
     */
    private function storeProfilePhoto(?UploadedFile $file): ?string
    {
        if (!$file) {
            return null;
        }

        $photoDir = config('noblemarriage.user_image_dir');
        $photoPath = $file->store($photoDir);
        $originalPhotoPathAbsolute = Storage::disk()->getDriver()->getAdapter()->applyPathPrefix($photoPath);

        $photoName = pathinfo($photoPath, PATHINFO_BASENAME);

        $thumbnailName = $this->getPhotoVariantName($photoName, config('constants.UserImageType.Thumbnail'));
        $thumbnailPath = "$photoDir/$thumbnailName";
        $thumbnailPathAbsolute = Storage::disk()->getDriver()->getAdapter()->applyPathPrefix($thumbnailPath);

        $blurredPhotoName = $this->getPhotoVariantName($photoName, config('constants.UserImageType.Blurred'));
        $blurredPhotoPath = "$photoDir/$blurredPhotoName";
        $blurredPhotoPathAbsolute = Storage::disk()->getDriver()->getAdapter()->applyPathPrefix($blurredPhotoPath);

        $blurredThumbnailPhotoName = $this->getPhotoVariantName($photoName, config('constants.UserImageType.Blurred_Thumbnail'));
        $blurredThumbnailPath = "$photoDir/$blurredThumbnailPhotoName";
        $blurredThumbnailPathAbsolute = Storage::disk()->getDriver()->getAdapter()->applyPathPrefix($blurredThumbnailPath);

        // Crop and resize photo to configured dimension while maintaining aspect ratio, and create different versions of it
        Image::make($originalPhotoPathAbsolute)
            ->fit(
                (int)config("constants.ProfileImage.Width"),
                (int)config("constants.ProfileImage.Height"),
                function ($constraint) {
                    $constraint->upsize();
                },
                'top'
            )
            ->save()
            ->fit(
                (int)config('constants.ProfileImageThumb.Width'),
                (int)config('constants.ProfileImageThumb.Height'),
                function ($constraint) {
                    $constraint->upsize();
                },
                'top'
            )
            ->save($thumbnailPathAbsolute)
            ->blur(50)
            ->fit(
                (int)config('constants.ProfileImage.Width'),
                (int)config('constants.ProfileImage.Height'),
                function ($constraint) {
                    $constraint->upsize();
                },
                'top'
            )
            ->save($blurredPhotoPathAbsolute)
            ->blur(50)
            ->fit(
                (int)config('constants.ProfileImageThumb.Width'),
                (int)config('constants.ProfileImageThumb.Height'),
                function ($constraint) {
                    $constraint->upsize();
                },
                'top'
            )
            ->save($blurredThumbnailPathAbsolute);

        if (env('FILESYSTEM_CLOUD') === 's3') {
            $cloudDir = config('noblemarriage.user_image_dir_cloud');

            Storage::cloud()->put("$cloudDir/$photoName", Storage::get($photoPath), 'public');
            Storage::cloud()->put("$cloudDir/$thumbnailName", Storage::get($thumbnailPath), 'public');
            Storage::cloud()->put("$cloudDir/$blurredPhotoName", Storage::get($blurredPhotoPath), 'public');
            Storage::cloud()->put("$cloudDir/$blurredThumbnailPhotoName", Storage::get($blurredThumbnailPath), 'public');

            Storage::delete($photoPath);
            Storage::delete($thumbnailPath);
            Storage::delete($blurredPhotoPath);
            Storage::delete($blurredThumbnailPath);
        }

        return $photoName;
    }

    private function getPhotoVariantName(string $photoName, string $type): string
    {
        return  join("-{$type}.", explode('.', $photoName));
    }

    /**
     * @param  UploadedFile|null $file
     * @param  string $type
     * @return null|string Stored file name, null if uploaded file is null
     */
    private function storeNonProfilePhoto(?UploadedFile $file, string $type): ?string
    {
        if (!$file) {
            return null;
        }

        if ($type == config('constants.ImageType.Customer')) {
            return null;
        }

        $attachmentDir = config("noblemarriage.{$type}_dir");
        $attachmentPath = $file->store($attachmentDir);
        $attachmentName = pathinfo($attachmentPath, PATHINFO_BASENAME);

        if (env('FILESYSTEM_CLOUD') === 's3') {
            $cloudDir = config("noblemarriage.".$type."_dir_cloud");
            Storage::cloud()->put("$cloudDir/$attachmentName", Storage::get($attachmentPath), 'public');

            Storage::delete($attachmentPath);
        }

        return $attachmentName;
    }

    private function removeProfilePhotoFromStorage(?string $photoName): void
    {
        if ($photoName) {
            $photoDir = $this->getDir('user_image');

            $photoPath = "$photoDir/$photoName";
            $thumbnailPath = "$photoDir/" . $this->getPhotoVariantName($photoName, config('constants.UserImageType.Thumbnail'));
            $blurredPhotoPath = "$photoDir/" . $this->getPhotoVariantName($photoName, config('constants.UserImageType.Blurred'));
            $blurredThumbnailPath = "$photoDir/" . $this->getPhotoVariantName($photoName, config('constants.UserImageType.Blurred_Thumbnail'));

            Storage::cloud()->delete([$photoPath, $thumbnailPath, $blurredPhotoPath, $blurredThumbnailPath]);
        }
    }

    private function removeNonProfilePhotoFromStorage(?string $attachmentName, string $type): void
    {
        if ($attachmentName) {
            $attachmentDir = $this->getDir($type);

            $attachmentPath = "$attachmentDir/$attachmentName";

            Storage::cloud()->delete($attachmentPath);
        }
    }

    private function getDir($type)
    {
        return config("noblemarriage.{$type}_dir" . (env('FILESYSTEM_CLOUD') === 'local' ? '' : '_cloud'));
    }
}
