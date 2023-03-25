<?php

namespace App\HelpersClasses;

class MyApp
{
    /**
     * @var MyApp|null
     */
    private static MyApp|null $app = null;

    /**
     * @var array|string[]
     */
    public array $Lang = ["ar","en"];

    /**
     * @var string
     */
    public string $defaultLang = "ar";

    /**
     * @var string
     */
    public string $localeSessionKey = "lang";

    /**
     * @var StorageFiles|null
     */
    public ?StorageFiles $storageFiles = null;

    /**
     * @var SearchModel|null
     */
    public ?SearchModel $Search = null;

    /**
     * @var StringProcess|null
     */
    public ?StringProcess $stringProcess = null;

    public function __construct()
    {
        $this->storageFiles = new StorageFiles();
        $this->Search = new SearchModel();
        $this->stringProcess = new StringProcess();
    }

    /**
     * @return MyApp
     */
    public static function Classes(): MyApp
    {
        if (is_null(self::$app)){
            self::$app = new static();
        }
        return self::$app;
    }

    public function getLangLocale(string $lang): string
    {
        return in_array($lang,$this->Lang) ? $lang : $this->defaultLang;
    }

}
