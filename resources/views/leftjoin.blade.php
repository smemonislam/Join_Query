<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Join Query</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Count</th>
                                <th scope="col">Min</th>
                                <th scope="col">Max</th>
                                <th scope="col">Avg</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leftjoins as $leftjoin)
                                <tr>
                                    <th scope="col">{{ $loop->iteration }}</th>
                                    <td scope="row">{{ $leftjoin->first_name }}</td>
                                    <td scope="row">{{ $leftjoin->last_name }}</td>
                                    <td scope="row">{{ $leftjoin->count }}</td>
                                    <td scope="row">{{ $leftjoin->min }}</td>
                                    <td scope="row">{{ $leftjoin->max }}</td>
                                    <td scope="row">{{ $leftjoin->avg }}</td>
                                    <td scope="row">@if( $leftjoin->count > 0 ) Active @else Deactive @endif</td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
