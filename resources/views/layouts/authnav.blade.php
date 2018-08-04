<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/profile') }}">Bulletin Board</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="ml-auto">
                <span class="name">Hello, {{ Auth::user()->name }}</span>
                <a href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
