<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css" />
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/ico">

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    *,
    ::after,
    ::before {
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      margin: 0;
    }

    h3 {
      font-size: 1.2375rem;
    }

    a {
      cursor: pointer;
      text-decoration: none;
      font-family: "Poppins", sans-serif;
    }

    li {
      list-style: none;
    }

    /* Layout skeleton */

    .wrapper {
      align-items: stretch;
      display: flex;
      width: 100%;
    }

    #sidebar {
      max-width: 264px;
      min-width: 264px;
      transition: all 0.35s ease-in-out;
      z-index: 1111;
    }

    /* Sidebar collapse */

    #sidebar.collapsed {
      margin-left: -264px;
    }

    .main {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      width: 100%;
      overflow: hidden;
      transition: all 0.35s ease-in-out;
    }

    .sidebar-logo {
      padding: 1.15rem 1.5rem;
    }

    .sidebar-nav {
      padding: 0;
    }

    .sidebar-header {
      padding: 1.5rem 1.5rem 0.375rem;
    }

    a.sidebar-link {
      padding: 0.625rem 1.625rem;
      color: black;
      position: relative;
      display: block;
      font-size: 1rem;
    }

    .sidebar-link[data-bs-toggle="collapse"]::after {
      border: solid;
      border-width: 0 0.075rem 0.075rem 0;
      content: "";
      display: inline-block;
      padding: 2px;
      position: absolute;
      right: 1.5rem;
      top: 1.4rem;
      transform: rotate(-135deg);
      transition: all 0.2s ease-out;
    }

    .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
      transform: rotate(45deg);
      transition: all 0.2s ease-out;
    }

    .content {
      flex: 1;
      max-width: 100vw;
      width: 100vw;
    }

    .code-block {
      color: #fff;
      border-radius: 10px;
      font-family: "Courier New", monospace;
      overflow: auto;
    }

    /* Responsive */

    @media (min-width: 768px) {
      .content {
        width: auto;
      }
    }
  </style>
  <title>Documentation &bull; Fake Store Api</title>
</head>

<body>

  <div class="wrapper">

    <!-- Sidebar -->
    <aside id="sidebar" class="border-end">

      <div class="h-100">

        <div class="sidebar-logo">

          <a href="/" class="navbar-brand mb-0 fs-3" style="direction: rtl; font-family: sans-serif;">
            FakeStore<strong>{API}</strong>
          </a>

        </div>

        <!-- Sidebar Navigation -->
        <ul class="sidebar-nav">

          <li class="sidebar-item">

            <a href="#" class="sidebar-link fw-bold collapsed" data-bs-toggle="collapse" data-bs-target="#introduction" aria-expanded="false" aria-controls="introduction">
              Introduction
            </a>

            <ul id="introduction" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

              <li class="sidebar-item">
                <a href="#pagination" class="sidebar-link">Pagination</a>
              </li>

            </ul>
          </li>

          <li class="sidebar-item">

            <a href="#products" class="sidebar-link fw-bold collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
              Products
            </a>

            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

              <li class="sidebar-item">
                <a href="#get-all-products" class="sidebar-link">Get all products</a>
              </li>

              <li class="sidebar-item">
                <a href="#get-a-single-product" class="sidebar-link">Get a single product</a>
              </li>

              <li class="sidebar-item">
                <a href="#create-a-product" class="sidebar-link">Create a product</a>
              </li>

              <li class="sidebar-item">
                <a href="#update-a-product" class="sidebar-link">Update a product</a>
              </li>

              <li class="sidebar-item">
                <a href="#delete-a-product" class="sidebar-link">Delete a product</a>
              </li>


              <li class="sidebar-item">
                <a href="#filter-products" class="sidebar-link collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                  Filter products
                </a>
                <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                  <li class="sidebar-item">
                    <a href="#filter-product-by-name" class="sidebar-link">Filter by name</a>
                  </li>
                  <li class="sidebar-item">
                    <a href="#filter-product-by-price" class="sidebar-link">Filter by price</a>
                  </li>
                  <li class="sidebar-item">
                    <a href="#filter-product-by-category" class="sidebar-link">Filter by category</a>
                  </li>
                  <li class="sidebar-item">
                    <a href="#join-filters" class="sidebar-link">Join filters</a>
                  </li>
                </ul>
              </li>

            </ul>
          </li>

          <li class="sidebar-item">

            <a href="#" class="sidebar-link collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false" aria-controls="users">
              Users
            </a>

            <ul id="users" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

              <li class="sidebar-item">
                <a href="#get-all-users" class="sidebar-link">Get all users</a>
              </li>

              <li class="sidebar-item">
                <a href="#get-a-single-user" class="sidebar-link">Get a single user</a>
              </li>

              <li class="sidebar-item">
                <a href="#create-a-user" class="sidebar-link">Create a user</a>
              </li>

              <li class="sidebar-item">
                <a href="#update-a-user" class="sidebar-link">Update a user</a>
              </li>

              <li class="sidebar-item">
                <a href="#delete-a-user" class="sidebar-link">Delete a user</a>
              </li>

            </ul>
          </li>

          <li class="sidebar-item">

            <a href="#" class="sidebar-link collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#categories" aria-expanded="false" aria-controls="categories">
              Categories
            </a>

            <ul id="categories" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

              <li class="sidebar-item">
                <a href="#get-all-categories" class="sidebar-link">Get all categories</a>
              </li>

            </ul>
          </li>

          <li class="sidebar-item">

            <a href="#" class="sidebar-link collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#authenticate" aria-expanded="false" aria-controls="authenticate">
              JWT Auth
            </a>

            <ul id="authenticate" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

              <li class="sidebar-item">
                <a href="#authentication" class="sidebar-link">Authentication</a>
              </li>

            </ul>
          </li>

        </ul>
      </div>
    </aside>

    <!-- Main Component -->
    <div class="main">
      <nav class="navbar navbar-expand px-3 border-bottom">

        <!-- Button for sidebar toggle -->
        <button class="btn" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="https://github.com/fredybarboza/fake-store-api">GitHub</a>
          </li>
        </ul>

      </nav>

      <main class="content px-3 py-2">

        <div class="container-fluid">

          <div class="mb-3 col-lg-9">

            <h2 class="fw-bold pt-2 mt-3">Introduction</h3>

              <p class="pt-4">
                This fake store API can be used in any project that requires data from products, categories, users or authentication services. You can use this API to make e-commerce prototypes, tests, sample codes, to learn, or whatever you decide to create!
              </p>

              @include('docs.v1.parts.pagination')

              <h2 id="products" class="fw-bold mt-5">Products</h2>

              @include('docs.v1.parts.products.products')
              @include('docs.v1.parts.products.single-product')
              @include('docs.v1.parts.products.create-product')
              @include('docs.v1.parts.products.update-product')
              @include('docs.v1.parts.products.delete-product')
              @include('docs.v1.parts.products.filter-products')

              <h2 id="products" class="fw-bold mt-5">Users</h2>

              @include('docs.v1.parts.users.all-users')
              @include('docs.v1.parts.users.single-user')
              @include('docs.v1.parts.users.create-user')
              @include('docs.v1.parts.users.update-user')
              @include('docs.v1.parts.users.delete-user')

              <h2 id="products" class="fw-bold mt-5">Categories</h2>

              @include('docs.v1.parts.categories.categories')

              <h2 id="products" class="fw-bold mt-5">Authentication</h2>

              @include('docs.v1.parts.auth.login')


          </div>
        </div>
      </main>

    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script>
    const toggler = document.querySelector(".btn");
    toggler.addEventListener("click", function() {
      document.querySelector("#sidebar").classList.toggle("collapsed");
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
  <script>
    hljs.highlightAll();
  </script>

</body>

</html>