<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h3>Header</h3>
    </div>
    <div class="container">
        @yield ('content')
    </div>
    <div class="container">
    <h3>Footer</h3>
    </div>
</body>
</html>