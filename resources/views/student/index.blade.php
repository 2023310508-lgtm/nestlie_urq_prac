@extends('layouts.app')

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('Students Information') }}</h1>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <a href="{{ route('student.create') }}" class="btn btn-primary mb-3">
                    Add Student
                </a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Date of Birth</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->fname }}</td>
                                <td>{{ $student->mname }}</td>
                                <td>{{ $student->lname }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->dob }}</td>
                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}" 
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <!-- FIXED DELETE -->
                                    <form action="{{ route('student.destroy', $student->id) }}" 
                                          method="POST" 
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection