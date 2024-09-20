<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>

    <div class="wrapper wrapper-content">
        <div class="row">
            <table style="border: 1px solid black; border-collapse: collapse; padding: 3px; width: 100%;" cellspacing="0">
                <thead style="background-color: #ccc">
                    <tr>
                        <th style="border: 1px solid black;">ID</th>
                        <th style="border: 1px solid black;">TITLE</th>
                        <th style="border: 1px solid black;">CATEGORY</th>
                        <th style="border: 1px solid black;">DESCRIPTION</th>
                        <th style="border: 1px solid black;">RATING</th>
                        <th style="border: 1px solid black;">PUBLISHED</th>
                        <th style="border: 1px solid black;">IMAGE</th>
                        <th style="border: 1px solid black;">DIRECTOR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td style="border: 1px solid black;">{{ $row->id }}</td>
                            <td style="border: 1px solid black;">{{ $row->title }}</td>
                            <td style="border: 1px solid black;">{{ $row->category }}</td>
                            <td style="border: 1px solid black;">{{ $row->decription }}</td>
                            <td style="border: 1px solid black;">{{ $row->star_rating }}</td>
                            <td style="border: 1px solid black;">
                                {{ \Carbon\Carbon::parse($row->date_published)->format('d M Y') }}</td>
                            <td style="border: 1px solid black;"><img
                                    src="{{ public_path('_uploads/' . $row->picture) }}" width="45"></td>
                            <td style="border: 1px solid black;">{{ $row->director }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
