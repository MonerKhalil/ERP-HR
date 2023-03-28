<?php

namespace App\HelpersClasses;

class SearchModel
{
    /**
     * @param $queryBuilder
     * @param array $filter
     * @param null $countItemsPagination
     * @param bool $orderByAsc
     * @return mixed
     */
    public function getData($queryBuilder, array $filter, $countItemsPagination = null, bool $orderByAsc = false): mixed
    {
        foreach ($filter as $key => $value){
            $queryBuilder = $queryBuilder->where($key,"LIKE","%".strtolower($value)."%");
        }

        return $this->dataFinal($queryBuilder,$countItemsPagination,$orderByAsc);
    }

    /**
     * @param $queryBuilder
     * @param $countItems
     * @param $asc
     * @return mixed
     */
    private function dataFinal($queryBuilder, $countItems, $asc): mixed
    {
        $tempCount = 10;

        $queryBuilder = $queryBuilder->orderBy("id",$asc ? "asc" : "desc");

        if ($countItems === 'all' || is_null($countItems)){
            return $queryBuilder->get();
        }

        if (is_numeric($countItems)&&$countItems>10){
            return $queryBuilder->paginate($countItems);
        }

        return $queryBuilder->paginate($tempCount);
    }
}
