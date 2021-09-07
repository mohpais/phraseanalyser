<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div style="width: vw; display: flex; flex-direction: column">
            <div class="flex-center" style="margin: 20px auto;">
                <form action="{{URL::to('/')}}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="data" id="data">
                    <button type="submit">submit</button>
                </form>
            </div>
            <div class="flex-center">
                @if (sizeof($response))
                    <table>
                        <tbody>
                            @foreach ($response as $item)
                                <tr>
                                    <td>{{$item->symbol}}</td>
                                    <td>:</td>
                                    <td>{{$item->countered}}</td>
                                    <td>:</td>
                                    <td>Before</td>
                                    <td>:</td>
                                    <td>{{$item->before}}</td>
                                    <td>:</td>
                                    <td>After</td>
                                    <td>:</td>
                                    <td>{{$item->after}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </body>
    {{-- <script>
        if@json($data)
        var data = 
    </script> --}}
</html>
