<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>Fake · Store · API</title>

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
                    <a class="nav-link fw-bold py-1 px-0" href="#">GitHub</a>
                </nav>

            </div>

        </header>

        <main class="px-3 mb-5 fs-1" style="margin-top: 5rem">

            <h1>fake store API<br /><span>the web prototype</span></h1>

            <p class="lead">
                Cover is a one-page template for building simple and beautiful home
                pages. Download, edit the text, and add your own fullscreen background
                photo to make it your own.
            </p>

            <p class="lead">
                <a href="" class="btn btn-dark rounded-pill">View on GitHub</a>
                <a href="#" class="btn btn-light border-2 border-dark fw-bold text-dark  rounded-pill">Learn more</a>
            </p>

        </main>
        

        <h3 style="margin-top: 10rem">Resources</h3>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique beatae quae assumenda in deserunt eos! Molestias, corporis quasi rerum assumenda omnis ullam doloribus necessitatibus deleniti aperiam nam eum porro possimus?</p>


        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

        <table class="table mt-5 mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

        <footer class="mt-auto text-dark">
            <p>
                Cover template for
                <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>,
                by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.
            </p>
        </footer>
    </div>
</body>

</html>