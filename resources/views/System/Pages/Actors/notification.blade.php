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
                                                            Clear All
                                                        </button>
                                                    </form>
                                                    <form action="{{route("notifications.edit")}}"
                                                          method="post">
                                                        @csrf
                                                        @method("put")
                                                        <button class="Button Button--Primary">
                                                            Read All
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="Card__Inner p0">
                                                <ul class="NotificationPage__NotificationList">
                                                    @foreach($data as $NotificationItem)
                                                        <li class="NotificationPage__Notification Notification">
                                                            <div class="Card__Inner">
                                                                <div class="Notification__Content">
                                                                    <a href="{{ $NotificationItem["route_name"] }}"
                                                                       class="Notification__Icon Notification__Icon--Receive">
                                                                        <i class="material-icons">description</i>
                                                                    </a>
                                                                    <a href="{{ $NotificationItem["route_name"] }}"
                                                                       class="Notification__Details">
                                                                        <p class="NotificationTitle">
                                                                            Please check your mail
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
                                                    <li class="NotificationPage__Notification Notification">
                                                        <div class="Card__Inner">
                                                            <div class="Notification__Content">
                                                                <a href="#"
                                                                   class="Notification__Icon Notification__Icon--Send">
                                                                    <i class="material-icons">description</i>
                                                                </a>
                                                                <a href="#"
                                                                   class="Notification__Details">
                                                                    <p class="NotificationTitle">
                                                                        Please check your mail
                                                                    </p>
                                                                    <p class="NotificationDescription">
                                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    </p>
                                                                    <p class="NotificationDate">2hr ago</p>
                                                                </a>
                                                                <div class="Notification__Remove">
                                                                    <i class="material-icons">close</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
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
