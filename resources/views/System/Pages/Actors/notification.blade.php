@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--Notification">
        <div class="NotificationPage">
            <div class="NotificationPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "الاشعارات" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit."
                ])
            </div>
            <div class="NotificationPage__Content">
                <div class="Row">
                    <div class="Container--MainContent">
                        <div class="Row Justify-Content-Center">
                            <div class="Col">
                                <div class="Card Overflow-Hidden">
                                    <div class="Card__Content">
                                        <div class="Card__InnerGroup">
                                            <div class="Card__Inner">
                                                <div class="NotificationPage__Buttons">
                                                    <form action="{{route("notifications.clear")}}"
                                                          method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit"
                                                                class="Button Button--Primary">
                                                            مسح الكل
                                                        </button>
                                                    </form>
                                                    <form action="{{route("notifications.edit")}}"
                                                          method="post">
                                                        @csrf
                                                        @method("put")
                                                        <button class="Button Button--Primary">
                                                            قراءة الكل
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="Card__Inner p0">
                                                <ul class="NotificationPage__NotificationList">
                                                    @if(count($data) > 0)
                                                        @foreach($data as $NotificationItem)
                                                            <li class="NotificationPage__Notification Notification"
                                                                data-NotificationID="{{ $NotificationItem["id"] }}">
                                                                <div class="Card__Inner">
                                                                    <div class="Notification__Content">
                                                                        @php
                                                                            $NotificationObject = GetNotificationIcon($NotificationItem["type"]) ;
                                                                        @endphp
                                                                        <a href="{{ $NotificationItem["route_name"] }}"
                                                                           class="Notification__Icon Notification__Icon--{{ $NotificationObject->Color }}">
                                                                            <i class="material-icons">
                                                                                {{ $NotificationObject->Icon }}
                                                                            </i>
                                                                        </a>
                                                                        <a href="{{ $NotificationItem["route_name"] }}"
                                                                           class="Notification__Details">
                                                                            <p class="NotificationTitle">
                                                                                من
                                                                                <span class="UserFrom">
                                                                                <strong>
                                                                                    {{ $NotificationItem["from"] }}
                                                                                </strong>
                                                                            </span> ,
                                                                                {{ $NotificationItem["type"] }} .
                                                                            </p>
                                                                            <p class="NotificationDescription">
                                                                                {{ $NotificationItem["body"] }} .
                                                                            </p>
                                                                            <p class="NotificationDate">
                                                                                {{ $NotificationItem["date"] }}
                                                                            </p>
                                                                        </a>
                                                                        <div class="Notification__Remove">
                                                                            <i class="material-icons">close</i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="NoData--V2">
                                                            <div class="Icon">
                                                                <i class="material-icons">
                                                                    sentiment_dissatisfied
                                                                </i>
                                                            </div>
                                                            <div class="Text">
                                                                لا يوجد اشعارات لعرضها
                                                            </div>
                                                        </li>
                                                    @endif

{{--                                                    <li class="NotificationPage__Notification Notification">--}}
{{--                                                        <div class="Card__Inner">--}}
{{--                                                            <div class="Notification__Content">--}}
{{--                                                                <a href="#"--}}
{{--                                                                   class="Notification__Icon Notification__Icon--Send">--}}
{{--                                                                    <i class="material-icons">description</i>--}}
{{--                                                                </a>--}}
{{--                                                                <a href="#"--}}
{{--                                                                   class="Notification__Details">--}}
{{--                                                                    <p class="NotificationTitle">--}}
{{--                                                                        Please check your mail--}}
{{--                                                                    </p>--}}
{{--                                                                    <p class="NotificationDescription">--}}
{{--                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--                                                                    </p>--}}
{{--                                                                    <p class="NotificationDate">2hr ago</p>--}}
{{--                                                                </a>--}}
{{--                                                                <div class="Notification__Remove">--}}
{{--                                                                    <i class="material-icons">close</i>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
                                                </ul>
                                            </div>
                                            <div class="Card__Inner">
                                                <div class="Card__Pagination">
                                                    @include("System.Components.paginationNum" , [
                                                    "PaginationData" => $data ,
                                                    "PartsViewNum" => 5
                                                    ])
                                                    @include("System.Components.paginationSelect" , [
                                                        "PaginationData" => $data
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
