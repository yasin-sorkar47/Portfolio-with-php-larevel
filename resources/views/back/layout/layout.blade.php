<!DOCTYPE html>
<html lang="zxx" dir="ltr" class="light">
    <head>
        @include('back.section.head')
    </head>

    <body class="font-inter dashcode-app" id="body_class">
        <main class="app-wrapper">
            @include('back.section.sidebar')

            @include('back.section.setting')

            <div class="flex flex-col justify-between min-h-screen">
                @include('back.section.header')
                @yield('content')
                @include('back.section.footer')
            </div>
        </main>
        <!-- scripts -->
        @include('back.section.script')
    </body>
</html>
