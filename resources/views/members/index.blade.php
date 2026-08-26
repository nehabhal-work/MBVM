@extends('layouts.master')

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h4 class="section-title">सदस्य यादी</h4>
            <h1 class="display-6 mb-4 mt-2">नोंदणी झालेले सदस्य</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>नाव</th>
                        <th>मोबाईल</th>
                        <th>ई-मेल</th>
                        <th>जिल्हा</th>
                        <th>तालुका</th>
                        <th>शहर</th>
                        <th>कंपनी</th>
                        <th>दिनांक</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $i => $member)
                        <tr>
                            <td>{{ $members->firstItem() + $i }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->mobile }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->jilha }}</td>
                            <td>{{ $member->taluka }}</td>
                            <td>{{ $member->city }}</td>
                            <td>{{ $member->company_name }}</td>
                            <td>{{ $member->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">कोणतीही नोंद उपलब्ध नाही.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $members->links() }}
    </div>
</div>
@endsection