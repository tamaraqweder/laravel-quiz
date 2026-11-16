<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Details</title>
</head>
<body>

    <h2>Lecturer Details</h2>

    <p>Name: {{ $lecturer->user->name }}</p>
    <p>Email: {{ $lecturer->user->email }}</p>
    <p>Employee Number: {{ $lecturer->employee_number }}</p>
    <p>Department: {{ $lecturer->department }}</p>
    <p>Office Room: {{ $lecturer->office_room }}</p>
    <p>Status: {{ $lecturer->status }}</p>

    <a href="{{ url('/') }}">Back</a>

</body>
</html>