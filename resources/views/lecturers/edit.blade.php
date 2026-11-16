
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lecturer</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            color: #253047;
        }

        .container {
            max-width: 750px;
            margin: auto;
        }

        .page-header {
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce2eb;
            border-radius: 8px;
            font-size: 14px;
            background-color: white;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #2563eb;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .save-btn, .cancel-btn {
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .save-btn {
            background-color: #2563eb;
            color: white;
            border: none;
        }

        .save-btn:hover {
            background-color: #1d4ed8;
        }

        .cancel-btn {
            background-color: white;
            color: #64748b;
            border: 1px solid #dce2eb;
        }

        .cancel-btn:hover {
            background-color: #f8fafc;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="page-header">
            <h1>Edit Lecturer</h1>
            <p class="subtitle">Update lecturer information below.</p>
        </div>

        <div class="form-card">

           <form action="{{ route('lecturerupdate', $lecturer->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

                <div class="form-row">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               placeholder="Enter full name"
                               value="{{ $lecturer->user->name }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ $lecturer->user->email }}"
                               placeholder="Enter email address"
                               required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="employee_number">Employee Number</label>
                        <input type="number"
                               id="employee_number"
                               name="employee_number"
                               value="{{ $lecturer->employee_number }}"

                               placeholder="Enter employee number">
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text"
                               id="department"
                               name="department"
                               value="{{ $lecturer->department }}"

                               placeholder="Enter department"
                               required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="office_room">Office Room</label>
                        <input type="text"
                               id="office_room"
                               name="office_room"
                               placeholder="e.g. B-204"
                          value="{{ $lecturer->office_room}}"

                
                               required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" required>
                            <option value="is_active">Active</option>
                            <option value="is_inactive">Inactive</option>
                        </select>
                    </div>

                </div>
                <label>Change Photo</label>
<input type="file" name="photo" accept="image/*">

                <div class="form-actions">
                    <button type="button" class="cancel-btn">
                        Cancel
                    </button>

                    <button type="submit" class="save-btn">
                        Update Lecturer
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>
