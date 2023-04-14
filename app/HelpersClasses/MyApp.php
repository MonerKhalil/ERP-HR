<?php

namespace App\HelpersClasses;

class MyApp
{
    public const RouteHome = "home";

    /**
     * @var MyApp|null
     * @author moner khalil
     */
    private static MyApp|null $app = null;

    /**
     * @var array|string[]
     * @author moner khalil
     */
    public array $Lang = ["ar","en"];

    /**
     * @var string
     * @author moner khalil
     */
    public string $defaultLang = "ar";

    /**
     * @var int
     */
    public int $defaultPagesCount = 10;

    /**
     * @var string
     * @author moner khalil
     */
    public string $localeSessionKey = "lang";

    /**
     * @var StorageFiles|null
     * @author moner khalil
     */
    public ?StorageFiles $storageFiles = null;

    /**
     * @var SearchModel|null
     * @author moner khalil
     */
    public ?SearchModel $Search = null;

    /**
     * @var StringProcess|null
     * @author moner khalil
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
     * @author moner khalil
     */
    public static function Classes(): MyApp
    {
        if (is_null(self::$app)){
            self::$app = new static();
        }
        return self::$app;
    }

    /**
     * @param string $lang
     * @return string
     * @author moner khalil
     */
    public function getLangLocale(string $lang): string
    {
        return in_array($lang,$this->Lang) ? $lang : $this->defaultLang;
    }

}
