@extends("System.Pages.globalPage")

@section("ContentPage")
    <section class="MainContent__Section MainContent__Section--AddUserPage">
        <div class="AddUserPage">
            <div class="AddUserPage__Breadcrumb">
                @include('System.Components.breadcrumb' , [
                    'mainTitle' => 'Add User' ,
                    'paths' => [['Home' , '#'] , ['Page']] ,
                    'summery' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,'
                ])
            </div>
            <div class="AddUserPage__Content">
                <div class="AddUserPage__Form">
                    <div class="Container--MainContent">
                        <div class="Row">
                            <div class="Card">
                                <div class="Card__Header">
                                    <div class="Card__Title">
                                        <h3>Add Employee</h3>
                                    </div>
                                    <div class="Card__Summery">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                                <div class="Card__Content">
                                    <form class="Form">
                                        <div class="Row Gap-1-5">
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Input">
                                                        <div class="Input__Area">
                                                            <input id="FirstName" class="Input__Field" type="text"
                                                                   name="FirstName" placeholder="First Name">
                                                            <label class="Input__Label" for="FirstName">First Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Input">
                                                        <div class="Input__Area">
                                                            <input id="LastName" class="Input__Field" type="text"
                                                                   name="LastName" placeholder="Last Name">
                                                            <label class="Input__Label" for="LastName">Last Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Input">
                                                        <div class="Input__Area">
                                                            <input id="UserName" class="Input__Field" type="text"
                                                                   name="UserName" placeholder="User Name">
                                                            <label class="Input__Label" for="UserName">User Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Input">
                                                        <div class="Input__Area">
                                                            <input id="Email" class="Input__Field"
                                                                   type="email" name="Email" placeholder="Email">
                                                            <label class="Input__Label" for="Email">Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Input Form__Input--Password">
                                                        <div class="Input__Area">
                                                            <input id="Password" class="Input__Field"
                                                                   type="password" name="Password" placeholder="Password">
                                                            <label class="Input__Label" for="Password">Password</label>
                                                            <i class="material-icons Input__Icon">visibility</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Input Form__Input--Password">
                                                        <div class="Input__Area">
                                                            <input id="Re-Password" class="Input__Field"
                                                                   type="password" name="Re-Password" placeholder="Re-Password">
                                                            <label class="Input__Label" for="Re-Password">Re-Password</label>
                                                            <i class="material-icons Input__Icon">visibility</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-4-md Col-6-sm">
                                                <div class="Form__Group">
                                                    <div class="Form__Select">
                                                        <div class="Select__Area">
                                                            <div class="Selector"
                                                                 data-name="Gender" data-required="true">
                                                                <div class="Selector__Main">
                                                                    <div class="Selector__WordLabel">Choose</div>
                                                                    <div class="Selector__WordChoose">Choose</div>
                                                                    <i class="material-icons Selector__Arrow">
                                                                        keyboard_arrow_down
                                                                    </i>
                                                                </div>
                                                                <ul class="Selector__Options">
                                                                    <li class="Selector__Option">Male</li>
                                                                    <li class="Selector__Option">Female</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-12-xs">
                                                <div class="Form__Group">
                                                    <div class="Form__Button">
                                                        <button class="Button Send"
                                                                type="submit">Add User</button>
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
    </section>
@endsection
