<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View page</title>
</head>
<body>
    
    <button><a href="{{ route('students.view', $students->id)}}">View</a></button>
    <p>{{student->name}}</p>

    <tr>
        @foreach ($students as $student)
        <td>{{student->email}}</td>
        @endforeach

     </tr>
</body>
</html>     