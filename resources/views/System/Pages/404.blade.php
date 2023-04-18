@extends("System.master")

@section("MainContent")
    {{--  Main Content  --}}
    <main class="MainContent">
        <section class="MainContent__Section MainContent__Section--Message">
            <div class="MessagePage MessagePage--404">
                <div class="Container--MainContent">
                    <div class="MessagePage__Content">
                        <img src="{{@asset("System/Assets/Images/404.jpg")}}"
                             alt="Coming Soon" class="MessagePage__Image" />
                        <div class="MessagePage__Description">
                            <p>
                                We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.
                            </p>
                            <a class="Button Button--Primary" href="#">
                                Back To Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
