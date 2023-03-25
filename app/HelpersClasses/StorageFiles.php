<?php

namespace App\HelpersClasses;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StorageFiles
{
    private const DISK = "public";
    public const EX_IMG = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    public const Ex_FILE = ['pdf','xls','csv'];
    public const FOLDER_IMAGES = "images";
    public const FOLDER_FILES = "files";


    /**
     * @param $file
     * @param string $pathDir
     * @param string|null $disk
     * @return bool|string
     * @throws Exception
     */
    public function Upload($file, string $pathDir = "", string $disk = null): bool|string
    {
        $ext = $file->getClientOriginalExtension();
        $file_base_name = str_replace('.' . $file->getClientOriginalExtension(), '', $file->getClientOriginalName());
        $fileNameFinal = strtolower(time() . Str::random(5) . '-' . Str::slug($file_base_name)) . '.' . $file->getClientOriginalExtension();
        if (in_array($ext, self::Ex_FILE)) {
            return Storage::disk(is_null($disk) ? self::DISK : $disk)
                ->putFileAs($pathDir . "/" . self::FOLDER_FILES . "/", $file, $fileNameFinal);
        }
        if (in_array($ext, self::EX_IMG)) {
            return Storage::disk(is_null($disk) ? self::DISK : $disk)
                ->putFileAs($pathDir . "/" . self::FOLDER_IMAGES . "/", $file, $fileNameFinal);
        }
        throw new Exception("you cant upload current file !!!");
    }

    /**
     * @param string|array $paths
     * @param string|null $disk
     * @return bool
     */
    public function deleteFile(string|array $paths, string $disk = null): bool
    {
        $disk = is_null($disk) ? self::DISK : $disk;
        if (Storage::disk($disk)->exists($paths)) {
            return Storage::disk(self::DISK)->delete($paths);
        }
        return false;
    }

    /**
     * @param string $path
     * @param string|null $disk
     * @return BinaryFileResponse
     * @throws Exception
     */
    public function downloadFile(string $path, string $disk = null): BinaryFileResponse
    {
        $path = Storage::disk(is_null($disk) ? self::DISK : $disk)->path($path);
        $file = file_exists($path) ? $path : null;
        if (!is_null($file)) {
            $file = response()->download($file);
            ob_end_clean();
            return $file;
        }
        throw new Exception("the path file {$path} is not exists");
    }
}