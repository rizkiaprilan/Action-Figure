<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #container {
            min-height: 100%;
            position: relative;
        }

        #body {
            padding: 10px;
            padding-bottom: 60px; /* Height of the footer */
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px; /* Height of the footer */
        }
    </style>

</head>
<body>
<div id="container">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}" style="color: white">Mimi Shop</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                </ul>
                <ul class="navbar-nav my-2 my-lg-0">

                    @if(Auth::user() == null)
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">Register </a>
                        </li>
                    @elseif(Auth::user() != null)
                        @if(Auth::user()->role == 'admin')
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('feedback')}}" style="color: white; text-decoration: none">Manage
                                    Feedback  </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('user')}}" style="color: white; text-decoration: none">Manage User
                                     </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('figure')}}" style="color: white; text-decoration: none">Manage Figure
                                     </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('category')}}" style="color: white; text-decoration: none">Manage
                                    Category  </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('adminTransaction')}}" style="color: white; text-decoration: none">Transaction
                                     </a>
                            </li>
                        @elseif(Auth::user()->role == 'member')
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="/member/feedback/{{Auth::user()->id}}"
                                   style="color: white; text-decoration: none">Feedback
                                     </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('cartshow')}}" style="color: white; text-decoration: none">My Cart
                                     </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{route('transaction')}}" style="color: white; text-decoration: none">My
                                    Transaction  </a>
                            </li>

                        @endif
                        <a class="nav-link" href="/member/profile/{{Auth::user()->id}}" style="color: white; text-decoration: none">Profile
                             </a>
                        <a class="nav-link" href="{{route('logout')}}" style="color: white; text-decoration: none">Log out </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
        <div id="body">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <div id="footer">
            <footer id="sticky-footer" class="py-3 bg-dark text-white-50">
                <div class="container text-center">
                    <small style="color: white">&copy; 2019 Copyright BlueJack 17-2</small>
                </div>
            </footer>
        </div>
    </div>
</div>
<script>
    setInterval(function () {
        var current = new Date();
        var hours = current.getHours();
        var minutes = current.getMinutes();
        var seconds = current.getSeconds();
        var days = current.getDate();
        var months = current.getMonth();
        var years = current.getFullYear();
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;
        days = (days < 10 ? "0" : "") + days;
        months = (months < 10 ? "0" : "") + months;
        years = (years < 10 ? "0" : "") + years;
        var currentTime = years + "-" + days + "-" + months + " " + hours + ":" + minutes + ":" + seconds;
        document.getElementById("timer").innerHTML = currentTime;
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
