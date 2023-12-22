<nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand" href="/">Ann Film</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ml-3">
          <li class="nav-item {{ ($route === "/") ? 'active' : '' }}" >
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ ($route === "favorite") ? 'active' : '' }}">
            <a class="nav-link" href="/favorite">Favorite</a>
          </li>
        </ul>
        <ul class="navbar-nav" style="margin: 0px; width: 10%">
          @if (session()->has('success'))
          <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
          <button type="submit" class="btn btn-light">Logout</button>
        </form>
          </li>
          @else
          <li class="nav-item">
            <a class="btn btn-light" href="/login">Login</a>
          </li>
          @endif
        </ul>
      </div>
</nav>