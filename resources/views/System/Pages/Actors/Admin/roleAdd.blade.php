@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--RollSetting">
        <div class="RollSettingPage">
            <div class="AddUserPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => "Role Setting" ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => "Click Or Pull Permissions To New Roles"
                ])
                <div class="RollSettingPage__Content">
                    <div class="Container--MainContent">
                        <div class="Row GapC-2">
                            <div class="Col-6-md">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__InnerGroup">
                                            <div class="Card__Inner pb0">
                                                <div class="Card__Header">
                                                    <div class="Card__Title">
                                                        <h3>Permissions</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Card__Inner">
                                                <div class="Card Card--Border">
                                                    <div class="Card__Body">
                                                        <div class="ListData">
                                                            <div class="DragDrop DragDrop__Zone
                                                                        ListData__Content" data-namesItem="Permissions">
                                                                @foreach($permissions as $Permission)
                                                                    <div class="DragDrop DragDrop__Item ListData__Item
                                                                            ListData__Item--Action" data-nameItem="Permissions">
                                                                        <input type="text" name="permissions[]"
                                                                               value="{{$Permission["id"]}}" hidden>
                                                                        <div class="Data_Col">
                                                                        <span class="Data_Label">
                                                                            {{$Permission["name"]}}
                                                                        </span>
                                                                        </div>
                                                                        <div class="Data_Col Data_Col--End">
                                                                            <i class="material-icons">
                                                                                sync_alt
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Col-6-md">
                                <div class="Card">
                                    <div class="Card__Content">
                                        <div class="Card__InnerGroup">
                                            <div class="Card__Inner pb0">
                                                <div class="Card__Header">
                                                    <div class="Card__Title">
                                                        <h3>New Role</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Card__Inner pt0">
                                                <form class="Form Form--Dark" action="{{route("roles.store")}}"
                                                      method="post">
                                                    @csrf
                                                    <div class="Row">
                                                        <div class="Col">
                                                            <div class="Form__Group">
                                                                <div class="Form__Input">
                                                                    <div class="Input__Area">
                                                                        <input id="RoleName" class="Input__Field" type="text"
                                                                               name="name" placeholder="Role Name" required>
                                                                        <label class="Input__Label" for="RoleName">Role Name</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col">
                                                            <div class="Card Card--Border">
                                                                <div class="Card__Body">
                                                                    <div class="ListData">
                                                                        <div class="DragDrop DragDrop__Zone
                                                                        ListData__Content" data-namesItem="Permissions">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Col">
                                                            <div class="Form__Group">
                                                                <div class="Form__Button">
                                                                    <button class="Button Send"
                                                                            type="submit">Create One</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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

