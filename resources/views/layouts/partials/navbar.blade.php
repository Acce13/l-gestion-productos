<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">@yield('title')</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        @isUser
        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products.index') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">Users</a>
        </li>
        @endisUser
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
        </li>
      </ul>
      <form action="{{ route('logout') }}" method="POST" class="d-flex">
        @csrf
        <button class="btn btn-danger border btn-fab-small border-light fw-bolder rounded-circle" type="submit">
          <i class="bi bi-door-open-fill"></i>
        </button>
      </form>
    </div>
  </div>
</nav>