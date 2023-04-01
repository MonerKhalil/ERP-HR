<?php

namespace App\HelpersClasses;

use App\Http\Requests\BaseRequest;

class SearchModel
{
    private $request;

    public function __construct()
    {
        $this->request = request();
    }

    /**
     * @param $queryBuilder
     * @param ?array $filter
     * @param callable|null $callback
     * @return mixed
     * @author moner khalil
     */
    public function getData($queryBuilder, array $filter = null,callable $callback = null): mixed
    {
        foreach ($this->filterSearchAttributes($filter) as $key => $value){
            $queryBuilder = $queryBuilder->where($key,"LIKE","%".strtolower($value)."%");
        }

        if (!is_null($callback)){
            return $callback($queryBuilder);
        }

        return $this->dataFinal($queryBuilder);
    }

    /**
     * @param $queryBuilder
     * @param $request
     * @return mixed
     * @author moner khalil
     */
    private function dataFinal($queryBuilder): mixed
    {
        $tempCount = $this->countItemsPaginate();

        $queryBuilder = $queryBuilder->orderBy("id","desc");

        if (is_string($tempCount)){
            return $queryBuilder->get();
        }

        return $queryBuilder->paginate($tempCount);
    }

    /**
     * @return int|string
     * @author moner khalil
     */
    private function countItemsPaginate(): int|string
    {
        if ( isset($this->request->countItems) &&
            (
            (is_numeric($this->request->countItems) && $this->request->countItems > 10)
            ||
            ($this->request->countItems == 'all')
            )
           )
           return $this->request->countItems;
        return 10;
    }

    /**
     * @param $filter
     * @return array|mixed
     * @author moner khalil
     */
    private function filterSearchAttributes($filter){
        $finalFilter = [];
        if (isset($filter)){
            $finalFilter = $filter;
        }
        if (isset($this->request->filter) && is_array($this->request->filter)){
            $finalFilter = array_merge($finalFilter,$this->request->filter);
        }
        return $finalFilter;
    }
}
