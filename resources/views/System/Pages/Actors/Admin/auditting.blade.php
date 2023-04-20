@extends("System.master")

@section("MainContent")
    {{--  Main Content  --}}
    <main class="MainContent">
        <section class="MainContent__Section MainContent__Section--Message">
            <div class="MessagePage MessagePage--ComingSoon">
                <div class="Container--MainContent">
                    <div class="MessagePage__Content">
                        <img src="{{@asset("System/Assets/Images/ComingSoon.jpg")}}"
                             alt="Coming Soon" class="MessagePage__Image" />
                        <div class="MessagePage__Title">
                            <h2>Coming Soon</h2>
                        </div>
                        <div class="MessagePage__Description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa dicta doloremque fugit incidunt laboriosam magni nisi possimus saepe velit. A aperiam, consequatur cupiditate eos illum iusto maiores molestias nemo sunt.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
