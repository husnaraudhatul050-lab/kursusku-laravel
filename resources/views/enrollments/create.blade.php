<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Enrollment - KursusKu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: #fff0f5;
            min-height: 100vh;
        }

        .navbar {
            background: #d81b60;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar h2 { font-size: 20px; }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .page-title {
            color: #880e4f;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(216, 27, 96, 0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #4a4a4a;
        }

        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #f8bbd0;
            border-radius: 6px;
            font-size: 14px;
            background: #fffafc;
        }

        select:focus {
            outline: none;
            border-color: #ec407a;
        }

        .error {
            color: #c2185b;
            font-size: 13px;
            margin-top: -12px;
            margin-bottom: 15px;
        }

        .btn-submit {
            width: 100%;
            background: #ec407a;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #d81b60;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>🌸 KursusKu</h2>
        <div>
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ route('enrollments.index') }}">Enrollment</a>
        </div>
    </div>

    <div class="container">
        <h1 class="page-title">📝 Tambah Enrollment</h1>

        <div class="card">
            <form method="POST" action="{{ route('enrollments.store') }}">
                @csrf

                <label for="participant_id">Participant</label>
                <select name="participant_id" id="participant_id" required>
                    <option value="">-- Pilih Participant --</option>
                    @foreach ($participants as $participant)
                        <option value="{{ $participant->id }}"
                            @selected(old('participant_id') == $participant->id)>
                            {{ $participant->name }} - {{ $participant->email }}
                        </option>
                    @endforeach
                </select>
                @error('participant_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label for="course_id">Course</label>
                <select name="course_id" id="course_id" required>
                    <option value="">-- Pilih Course --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}"
                            @selected(old('course_id') == $course->id)>
                            {{ $course->code }} - {{ $course->name }}
                        </option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn-submit">Simpan Enrollment</button>
            </form>
        </div>
    </div>

</body>
</html>