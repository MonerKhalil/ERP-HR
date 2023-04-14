@extends("System.master")

@section("MainContent")
    {{--  Main Header  --}}
    @include("System.Layouts.Header.header")
    {{--  Side Menu  --}}
    @include("System.Layouts.Navigation.menuNav")
    {{--  Main Content  --}}
    <main class="MainContent">
        @yield("ContentPage")
    </main>
    {{--  Popup Content  --}}
    @yield("PopupPage")
    {{--  Footer  --}}
    @include("System.Layouts.Footer.footer")
@endsection
