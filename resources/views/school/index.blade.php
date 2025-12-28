<!DOCTYPE html>
<html >
<head>
   
    <title>Document</title>
</head>
<body>
    <h2>School data</h2>
    <a href="{{ route('') }}">Add new data</a>
    <table border="2">
        <thead>
                <tr>
                    <th>Id</th>
                    <th>Classroom</th>
                    <th>Student</th>
                    <th>Teachers</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $school->classroom }}</td>
                    <td>{{ $school->student }}</td>
                    <td>{{ $school->teachers }}</td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
       
    </table>
</body>
</html>