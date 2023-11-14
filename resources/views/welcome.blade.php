<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <title>Fake &bull; Store &bull; API</title>

    <style>
        /* 
         *Base structure 
         */

        .cover-container {
            max-width: 42em;
        }

        /* 
         *Header 
         */

        .nav-masthead .nav-link {
            color: #333;
            border-bottom: 0.25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: #333;
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: black;
            border-bottom-color: #333;
        }
    </style>
</head>

<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <header class="mb-5">

            <div>

                <a href="" class="navbar-brand float-md-start fs-2" style="direction: rtl; font-family: sans-serif">
                    FakeStore<strong>{API}</strong>
                </a>

                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="#">Home</a>
                    <a class="nav-link fw-bold py-1 px-0" href="/docs/v1">Docs</a>
                    <a class="nav-link fw-bold py-1 px-0" href="https://github.com/fredybarboza/fake-store-api">GitHub</a>
                </nav>

            </div>

        </header>

        <main class="px-3 mb-5 fs-1" style="margin-top: 5rem">

            <h1>Make e-commerce prototypes without worrying about the backend.</h1>

            <p class="lead">
                Our API empowers developers with all the CRUD operations, providing a comprehensive platform to test and showcase e-commerce functionalities.
            </p>


            <p class="lead">
                <a href="https://github.com/fredybarboza/fake-store-api" class="btn btn-dark rounded-pill">View on GitHub</a>
                <a href="/docs/v1" class="btn btn-light border-2 border-dark fw-bold text-dark  rounded-pill">Read Docs.</a>
            </p>

        </main>

        <p class="fs-3 fw-bold" style="margin-top: 8rem;">Try it:</p>

        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control fw-bold" value="/api/v1/products/1" placeholder="Escribe algo..." aria-label="Escribe algo..." aria-describedby="basic-addon2" readonly>
                        <button class="btn btn-dark" type="button" id="mostrarBtn">GET</button>
                    </div>
                </div>
            </div>
        </div>

        <pre id="miTarjeta" class="bg-dark text-light p-2 rounded text-start" style="display: none;"><code>{
    "id": 1,
    "name": "Red leather sofa.",
    "price": "239.99",
    "description": "An amazing sofa.",
    "category": {
        "id": 3,
        "name": "Home and Decor"
    },
    "images": [
        "https://image/example"
    ]
}</code></pre>



        <h1 class="fw-bold" style="margin-top: 5rem">Resources</h1>

        <p class="fs-4">This API provides different sets of common resources:</p>


        <table class="table fs-4">

            <tbody>
                <tr>
                    <td><a href="/api/v1/products" style="text-decoration: none;">/products</a></td>
                    <td>20 products</td>
                </tr>
                <tr>
                    <td><a href="/api/v1/users" style="text-decoration: none;">/users</a></td>
                    <td>20 users</td>
                </tr>
                <tr>
                    <td><a href="/api/v1/categories" style="text-decoration: none;">/categories</a></td>
                    <td>4 categories</td>
                </tr>
                <tr>
                    <td>/auth</td>
                    <td>to get auth token</td>
                </tr>
            </tbody>
        </table>

        <h1 class="fw-bold mt-5">Features</h1>

        <div class="container mt-3">
            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body fs-3">
                            <i class="bi bi-pencil-square"></i>
                            <p>All crud operations</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body fs-3">
                            <i class="bi bi-file-earmark"></i>
                            <p>Pagination</p>
                        </div>
                    </div>
                </div>

                <div class="w-100 d-lg-none d-md-block"></div> <!-- Línea de salto en dispositivos medianos -->

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body fs-3">
                            <i class="bi bi-gear"></i>
                            <p>Auth with JWT</p>
                        </div>
                    </div>
                </div>
                <!-- Puedes seguir agregando más cards dentro de columnas aquí -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body fs-3">
                            <i class="bi bi-search"></i>
                            <p>Filters</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body fs-3">
                            <i class="bi bi-star"></i>
                            <p>Rest API</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <a href="/docs/v1" class="btn btn-outline-dark fw-bold mt-3 mb-3 rounded-pill">Check out the docs!</a>



        <footer class="mt-auto text-dark fw-bold">
            <hr>
            <p>
                Created by <a href="https://github.com/fredybarboza">Fredy Barboza</a> &bull; 2023
            </p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Obtener referencias a los elementos del DOM
        var mostrarBtn = document.getElementById('mostrarBtn');
        var miTarjeta = document.getElementById('miTarjeta');

        // Manejador de eventos para el clic en el botón
        mostrarBtn.addEventListener('click', function() {
            // Verificar si la tarjeta está oculta
            if (miTarjeta.style.display === 'none') {
                // Mostrar la tarjeta si está oculta
                miTarjeta.style.display = 'block';
                // Deshabilitar el botón después de mostrar la tarjeta
                mostrarBtn.disabled = true;
            }
        });
    </script>

</body>

</html>