@extends 'layouts.app'
@section('content')
    <h1>Delete Student</h1>
    <p>Are you sure you want to delete this student?</p>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection