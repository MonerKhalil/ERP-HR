<?php

namespace App\HelpersClasses;


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
    public function getDataFilter($queryBuilder, array $filter = null
        ,bool $isAll = null,string $isFilterDate_SetColumn = null,callable $callback = null): mixed
    {
        $filterFinal = $this->filterSearchAttributes($filter);

        foreach ($filterFinal as $key => $value){
            $queryBuilder = $queryBuilder->where($key,"LIKE","%".strtolower($value)."%");
        }

        if (isset($filterFinal['start_date']) && isset($filterFinal['end_date'])){
            if (strtotime($filter['start_date']) <= strtotime($filter['end_date'])){
                $queryBuilder = is_null($isFilterDate_SetColumn) ? $queryBuilder->whereBetween("created_at",[$filterFinal['start_date'],$filterFinal['end_date']])
                : $queryBuilder->whereBetween($isFilterDate_SetColumn,[$filterFinal['start_date'],$filterFinal['end_date']]);
            }
        }

        if (!is_null($callback)){
            return $callback($queryBuilder);
        }
        if ($isAll){
            return $queryBuilder->get();
        }

        return $this->dataPaginate($queryBuilder);
    }

    /**
     * @param $queryBuilder
     * @param $request
     * @return mixed
     * @author moner khalil
     */
    public function dataPaginate($queryBuilder): mixed
    {
        $tempCount = $this->countItemsPaginate();

        $queryBuilder = $queryBuilder->orderBy("id","desc");

        if ($tempCount === "all"){
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
     * @return mixed
     * @author moner khalil
     */
    private function filterSearchAttributes($filter): mixed
    {
        $finalFilter = [];
        if(!is_null($this->request->input("isClearFilter"))
            && $this->request->input("isClearFilter") === "true" ){
            return $finalFilter;
        }
        if (isset($filter)){
            $finalFilter = $filter;
        }
        if (isset($this->request->filter) && is_array($this->request->filter)){
            $finalFilter = array_merge($finalFilter,$this->request->filter);
        }
        return $finalFilter;
    }
}
