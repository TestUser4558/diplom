<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Invoice PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            margin: 0;
            padding: 5px 0;
        }

        p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Отчет по использованию оборудования</h1>
    </div>

    <p><strong>Название оборудования:</strong> {{ $eqip->name }}</p>

    <h2 class="section-title">История</h2>
    <table>
        <thead>
            <tr>
                <th>Сотрудник</th>
                <th>Дата старта</th>
                <th>Дата окончания</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eqip->usings as $use)
            <tr>
                <td>{{ $use->user->fio }}</td>
                <td>{{ $use->date_start }}</td>
                <td>{{ $use->date_end }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
