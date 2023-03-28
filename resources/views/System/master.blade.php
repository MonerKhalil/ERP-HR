<!doctype html>
<html lang="en" dir="ltr">
{{--<html lang="ar" dir="rtl">--}}

    <head>
        @include('System.Layouts.head.head')
    </head>

    <body>
        <div id="Wrapper">
            {{--  Main Header  --}}
            @include("System.Layouts.Header.header")
            {{--  Side Menu  --}}
            @include("System.Layouts.Navigation.menuNav")
            {{--  Main Content  --}}
            <main class="MainContent">
                <section class="MainContent__Section">
                    @yield("ContentPage")
                </section>
            </main>
            {{--  Footer  --}}
            @include("System.Layouts.Footer.footer")
            {{-- Scripts --}}
            @include("System.Layouts.Footer.footerScript")
        </div>
    </body>

</html>
