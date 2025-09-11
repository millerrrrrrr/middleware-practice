@extends('layout.teacherDashboard')
@section('title', 'Teacher')

@section('main')
<div class="card w-96 bg-gray-600 m-4 card-xs shadow-sm">
    <div class="card-body">
      <h2 class="card-title">This is Teacher's Dashboard</h2>
      <p>Click to Logout</p>
      <div class="justify-end card-actions">
            <form action=" {{ route('teacherLogout') }} "  method="POST">
              @csrf
                <button class="btn btn-primary btn-sm">
                    Logout
                </button>
            </form>
      </div>
    </div>
  </div>
@endsection