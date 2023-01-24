<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Preloader --}}
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layouts.navheader')

        @include('layouts.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        @include('layouts.footer')

    </div>

    @include('layouts.script')
</body>

<!-- Mirrored from tixia.dexignzone.com/xhtml/customer-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 10:26:33 GMT -->

</html>
