<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome!</div>
                    <div class="card-body">
                        <button class="btn btn-primary"><a href="http://localhost:8000/verify/email/{{$token}}">Verify Email</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>