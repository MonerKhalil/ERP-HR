<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuditController extends Controller
{
    /**
     * @param Request $request
     * @return Response|RedirectResponse|null
     * @author moner khalil
     */
    public function NotificationsAuditUserShow(Request $request): Response|RedirectResponse|null
    {
        $dataFilter = $request->filter;
        $user = auth()->user();
        $queryAudit = $user->notifications()->where("data->type","audit");
        $data = null;
        if (!is_null($dataFilter)){
            $idsNotificationsFilter = $queryAudit->get()->map(function ($item) {
                return $this->resolveDataItem($item);
            });
            $idsNotificationsFilter = $idsNotificationsFilter->filter(function ($item) use ($dataFilter) {
                $check = true;
                if (isset($dataFilter['user_name'])) {
                    $check = str_contains($item->data['data']['user_name'], $dataFilter['user_name']);
                }
                if (isset($dataFilter['table_name'])) {
                    $check = $check && str_contains($item->data['data']['table_name'], $dataFilter['table_name']);
                }
                if (isset($dataFilter['event'])) {
                    $check = $check && str_contains($item->data['data']['event'], $dataFilter['event']);
                }
                if (isset($dataFilter['date'])) {
                    $check = $check && str_contains($item->data['data']['date'], $dataFilter['date']);
                }
                return $check;
            })->pluck('id');
            $data = $queryAudit->whereIn("id", $idsNotificationsFilter);
        }else{
            $data = $queryAudit;
        }
        $data = MyApp::Classes()->Search->dataPaginate($data);
        if ($data instanceof LengthAwarePaginator){
            $data = $data->through(function ($item) {
                return $this->resolveDataItem($item);
            });
        }else{
           $data = $data->map(function ($item) {
                return $this->resolveDataItem($item);
            });
        }
        return $this->responseSuccess("System.Pages.Actors.Admin.auditing",compact("data"));
    }

    private function resolveDataItem($item){
        $data = $item->data;
        $data['data']['event'] = __($item->data['data']['event']);
        $data['data']['table_name'] = __($item->data['data']['table_name']);
        $data['data']['date'] = Carbon::parse($item->created_at)->diffForHumans();
        $item->data = $data;
        return $item;
    }
}
