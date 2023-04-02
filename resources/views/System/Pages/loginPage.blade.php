@extends("System.master")

@section("MainContent")
    <main class="MainContent">
        <section class="MainContent__Section MainContent__Section--Login">
            <div class="LoginPage">
                <div class="LoginPage__Wrap">
                    <div class="LoginPage__Content">
                        <div class="LoginPage__ImagePage">
                            <img src="{{asset("System/Assets/Images/Login.jpg")}}" alt="" />
                        </div>
                        <div class="LoginPage__LoginForm">
                            <div class="Content">
                                <div class="LoginPage__Logo">
                                    <div class="Logo">
                                        <a>
                                            <img src="{{asset("System/Assets/Images/Logo.png")}}"
                                                 alt="#" class="Logo__Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="LoginPage__Text">
                                    <h2 class="LoginPage__Title">Welcome to ERP Epic</h2>
                                    <p class="LoginPage__Summery">
                                        Lorem ipsum is een opvultekst die drukkers, zetters, grafisch ontwerpers en dergelijken gebruiken om te kijken hoe een opmaak er grafisch uitziet
                                    </p>
                                </div>
                                <div class="LoginPage__Form">
                                    <h2 class="LoginPage__Title">Sign in</h2>
                                    <form class="Form" action="#" method="post">
                                        <div class="Row GapR-1-5">
                                            <div class="Col">
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
                                            <div class="Col">
                                                <div class="Form__Group">
                                                    <div class="Form__Input Form__Input--Password">
                                                        <div class="Input__Area">
                                                            <input id="Password" class="Input__Field"
                                                                   type="password" name="password" placeholder="Password">
                                                            <label class="Input__Label" for="Password">Password</label>
                                                            <i class="material-icons Input__Icon">visibility</i>
                                                            {{--   Icon If We Need    --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-6-xs">
                                                <div class="Form__Group">
                                                    <div class="Form__CheckBox">
                                                        <div class="CheckBox__Area">
                                                            <input type="checkbox" id="RememberMe"
                                                                   class="CheckBox__Input">
                                                            <label class="CheckBox__Label" for="RememberMe">
                                                            <span class="IconChecked">
                                                            <i class="material-icons ">
                                                            check_small
                                                        </i>
                                                        </span>
                                                                <span class="TextCheckBox">Remember Me</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col-6-xs">
                                                <div class="Form__Group">
                                                    <div class="Form__Link">
                                                        <div class="Link__Area">
                                                            <a href="#" class="Link__Anchor">Forget Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Col">
                                                <div class="Form__Group">
                                                    <div class="Form__Button">
                                                        <button class="Button Send"
                                                                type="submit">Login To System</button>
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
        </section>
    </main>
@endsection
