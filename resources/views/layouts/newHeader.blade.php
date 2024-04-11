<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .user-header {

            color: #162517;
            font-size: 18px;
            font-family: Source Sans Pro
        }



        .user-background{
            margin: 0;
            padding: 0;
        }

        .user-header .user-info {
            font-weight: bold;
        }


        .user-header .user-admin {

            color: #FF0000;
        }
    </style>
</head>

<body>
    <div class="row user-background justify-content-end bg-light">
        <div class="col-3 text-right user-header">
            <span class="user-info">Usuario:</span> {{ auth()->user()->names }} {{ auth()->user()->last_names }}
            @if (auth()->user()->is_admin == 1)
                <span class="user-admin"> - Administrador </span>
            @endif
        </div>
    </div>
</body>

</html>


