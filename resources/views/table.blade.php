<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table of Authors</title>
    @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
    <table class="table-fixed">
        <thead class="bg-slate-700 text-slate-50">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr class='bg-slate-400'>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'>{{ $author->id }}</td>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'>{{ $author->username }}</td>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'>{{ $author->email }}</td>
                    <td class='p-2 border-l-2 border-r-2 border-slate-950'>{{ $author->password }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>