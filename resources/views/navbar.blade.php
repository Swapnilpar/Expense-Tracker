<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <title>
        @section('title')
            MoneyMinder
        @endsection
    </title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            font-family: 'poppins';
            color: #202020;
            background-image: linear-gradient(to right, #d4b9ff, #c7d9ff, #eed4ff);
            animation: flowGradient 11s infinite linear;
        }

        @keyframes flowGradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

    </style>


</head>

<body>
        
        <nav class="navbar  navbar-expand-lg bg-body-tertiary rounded">
            <div class="container nav-cont border-primary">
                <a class="navbar-brand" href="#">
                    <img src="https://e7.pngegg.com/pngimages/417/38/png-clipart-expense-management-finance-budget-android-personal-finance-sign-thumbnail.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    MoneyMinder
                </a>                
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link ps-3" href="/">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-3" href="income">Income Tracker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-3" href="expense">Expense Tracker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-3" href="budget">Budget Tracking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

</body>

</html>





