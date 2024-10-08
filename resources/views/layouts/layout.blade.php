<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Eamon Express')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="@yield('css_content')">
  </head>
  <body data-bs-spy="scroll" data-bs-target=".navbar" tabindex="0" style="background-color: #b0e1f9;">

    <header id="headerSection" class="sticky-top">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #b0e1f9;">
            <div class="container-md">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="Logo" class="img-fluid" style="max-height: 45px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#track">Track a Package</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="#signup">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="@yield('js_content')"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  </body>
</html>
