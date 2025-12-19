<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a href="{{ url('/products')}}" class="navbar-brand">Product App</a>
            <a href="{{ url('products/create')}}" class="btn btn-success">Add Product</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>