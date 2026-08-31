@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <h4 class="section-title">नोंदणीकृत वापरकर्ते</h4>
        <h1 class="display-6 mb-4 mt-2">नोंदणीकृत वापरकर्त्यांची यादी (फक्त अ‍ॅडमिनसाठी)</h1>

        <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="नाव / ई-मेल शोधा">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary px-4 w-100">शोधा</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table bg-dark text-light">
                    <tr>
                        <th>#</th>
                        <th>नाव</th>
                        <th>ई-मेल</th>
                        <th>भूमिका</th>
                        <th>ई-मेल पडताळले?</th>
                        <th>नोंदणी दिनांक</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $i => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user->role === 'admin' ? 'सुपर अ‍ॅडमिन' : 'सदस्य' }}
                                </span>
                            </td>
                            <td>{{ $user->email_verified_at ? '✓ होय' : '✗ नाही' }}</td>
                            <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">कोणतेही वापरकर्ते सापडले नाहीत.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $users->appends(request()->query())->links() }}
    </div>
</div>
@endsection