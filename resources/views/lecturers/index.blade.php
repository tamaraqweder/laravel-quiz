
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturers List</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            color: #253047;
        }

        .container {
            max-width: 1150px;
            margin: auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        .add-btn {
            background-color: #2563eb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            overflow-x: auto;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 16px 20px;
            border-bottom: 1px solid #e9edf3;
        }

        th {
            background-color: #f8fafc;
            font-size: 13px;
            color: #64748b;
        }

        td {
            font-size: 14px;
        }

        tr:hover {
            background-color: #f9fbff;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background-color: #dcfce7;
            color: #15803d;
            font-size: 12px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .edit-btn, .delete-btn {
            padding: 7px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .delete-btn {
            background-color: #fee2e2;
            color: #dc2626;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="page-header">
            <h1>Lecturers List</h1>
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('lecturercreate') }}">
                          <button class="add-btn">+ Add Lecturer</button>
            </a>
  
          @endif
            
        </div>

        <div class="table-container">
            @if(session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Employee Number</th>
                        <th>Department</th>
                        <th>Office Room</th>
                        <th>pohoto</th>
                        <th>Status</th>
                        <th>Courses Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                 


                   @foreach ($lecturers as  $lecturer)
                   <tr>
                        <td>{{ $lecturer->id }}</td>
                        <td>{{ $lecturer->user->name}}</td>
                        <td>{{ $lecturer->user->email}}</td>
                        <td>{{ $lecturer->employee_number }}</td>
                        <td>{{ $lecturer->department}}</td>

                        <td>{{ $lecturer->office_room}}</td>
                        <td>
                               <img src="{{ asset('storage/' . $lecturer->photo) }}"
                              alt="Lecturer Photo"
                              width="60"
                         height="60">
                         </td>


                        <td>{{ $lecturer->status}}</td>
                        <td>{{ $lecturer->courses_count }}</td>
                        @if(auth()->user()->role === 'admin')
                             <!-- أزرار Create وEdit وDelete -->
                                <td>
                            <div class="actions">
                                 <a href="{{ route('lecturershow', $lecturer->id) }}">
                                    <button class="show-btn">view</button>
                                </a>
                                <a href="{{ route('lectureredit', $lecturer->id) }}">
                                    <button class="edit-btn">Edit</button>
                                </a>
                               <form action="{{ route('lecturerdelete', $lecturer->id) }}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="delete-btn"> Delete</button>
                                </form>

                            </div>
                        </td>
                          @endif
                       

                   </tr>
                   
                   @endforeach

                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
