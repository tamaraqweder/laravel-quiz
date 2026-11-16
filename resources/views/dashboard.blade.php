
@extends('home_page')

@section('content')

<style>
    .dashboard-container {
        margin-left: 300px;
        padding: 30px;
        background-color: #f4f7fc;
        min-height: calc(100vh - 60px);
        font-family: Arial, sans-serif;
        box-sizing: border-box;
    }

    .dashboard-title {
        color: #1e3a5f;
        font-size: 30px;
        margin: 0 0 10px;
    }

    .dashboard-description {
        color: #64748b;
        margin-bottom: 30px;
    }

    .dashboard-cards {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        max-width: 700px;
    }

    .dashboard-card {
        background-color: white;
        padding: 25px 30px;
        border-radius: 12px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .dashboard-card h3 {
        color: #475569;
        font-size: 18px;
        margin: 0 0 15px;
    }

    .dashboard-card h2 {
        color: #2563eb;
        font-size: 36px;
        margin: 0;
    }

    @media (max-width: 768px) {
        .dashboard-container {
            margin-left: 0;
            padding: 20px;
        }

        .dashboard-cards {
            max-width: 100%;
        }
    }
</style>

<div class="dashboard-container">

    <h1 class="dashboard-title">
        Academic Dashboard
    </h1>

    <p class="dashboard-description">
        Overview of academic management statistics
    </p>

    <div class="dashboard-cards">

        <div class="dashboard-card">
            <h3>Total Lecturers</h3>
            <h2>{{ $totalLecturers }}</h2>
        </div>

        <div class="dashboard-card">
            <h3>Total Courses</h3>
            <h2>{{ $totalCourses }}</h2>
        </div>

        <div class="dashboard-card">
            <h3>Total Lectures</h3>
            <h2>{{ $totalLectures }}</h2>
        </div>

        <div class="dashboard-card">
            <h3>Total Enrollments</h3>
            <h2>{{ $totalEnrollments }}</h2>
        </div>

    </div>

</div>

@endsection
