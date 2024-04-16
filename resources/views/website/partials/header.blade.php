<!--=================================
     header -->

<header id="header" class="header fancy">
    <div class="topbar-2">
        <div class="bg-black p-4">
            <h1 class="text-color text-center font-semibold">
                <a href="{{ route('auth.login') }}" class="text-color font-semibold hover:underline hover:text-white">CLICK HERE TO SIGN IN AND ACCESS YOUR ACCOUNT</a>
            </h1>
        </div>
        
        
    </div>
    <style>
        .alert-suscribe {
            margin-top: 80px;
            margin-left: 10px;
            color: #fff;
            text-align: center;
            width: 260px;
            padding: 10px;
            border-radius: 7px;
            transition: all 0.3s ease ;
            position: absolute
        }
    </style>

    @if (Session::has('status'))
        <div class="alert-suscribe wow">
            <div id="status-alert" class="alert alert-{{ session('status') }}" role="alert">
                {{ session('message') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert-suscribe wow">
                <div id="status-alert-danger" class="alert alert-danger" role="alert">{{ $error }}
                </div>
            </div>
        @endforeach
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusAlert = document.getElementById('status-alert');
            var statusAlertDanger = document.getElementById('status-alert-danger');

            if (statusAlert) {
                statusAlert.parentElement.style.backgroundColor = "green";
            }

            if (statusAlertDanger) {
                statusAlertDanger.parentElement.style.backgroundColor = "red";
            }

            setTimeout(function() {
                if (statusAlertDanger) {
                    statusAlertDanger.parentElement.remove();
                }
                if (statusAlert) {
                    statusAlert.parentElement.remove();
                }
            }, 2000);
        });
    </script>

    @include('website.partials.navbar')
</header>
<!--=================================
header -->
