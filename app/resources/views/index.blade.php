<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Котировки</title>
</head>
<body>
    @php
        $last_update = date('d.m.Y', strtotime($last_update));
    @endphp

    <h1>Курсы валют ЦБ РФ на {{ $last_update }}</h1>
    
    @if(count($rates) === 0)
        <h2>Данные еще не загрузились.</h2>
    @else

    <table>
        <thead>
            <tr>
                <th>Цифр. код</th>
                <th>Букв. код</th>
                <th>Единиц</th>
                <th>Валюта</th>
                <th>Курс</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($rates as $rate)
                <tr>
                    <td>{{ $rate->num_code }}</td>
                    <td>{{ $rate->char_code }}</td>
                    <td>{{ $rate->nominal }}</td>
                    <td>{{ $rate->name }}</td>
                    <td>
                        <span>{{ $rate->value }}</span>
                    </td>
                    <td>
                        @php
                            $currencyDayDiff = round($rate->value - $rate->previous_value, 1);
                            $isGrown = $currencyDayDiff > 0;
                        @endphp
                        <span class="diff {{ $isGrown ? 'grown' : 'decreased' }}">
                            ({{ $isGrown ? '+'.$currencyDayDiff : $currencyDayDiff }})
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <style>
        * {
            font-family: arial;    
        }

        h1, h2, h3 {
            text-align: center;
        }

        table {
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
        }

        td {
            padding: 15px 10px;
            /* border: 1px solid #000; */
        }

        .grown {
            color: green;
        }
        .decreased {
            color: red;
        }
        .diff {
            font-weight: bold;
        }
    </style>
</body>
</html>