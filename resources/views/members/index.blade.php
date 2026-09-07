@extends('layouts.master')

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="wow fadeInUp d-flex justify-content-between align-items-center flex-wrap" data-wow-delay="0.1s">
                <div>
                    <h4 class="section-title">सदस्य यादी</h4>
                    <h1 class="display-6 mb-4 mt-2">नोंदणी झालेले सदस्य</h1>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">← मुख्यपृष्ठावर परत जा</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary">लॉगआऊट</button>
                    </form>
                </div>
            </div>

            {{-- Admin-only quick actions --}}
            @if (auth()->user()->role === 'admin')
                <div class="d-flex flex-wrap gap-2 mb-4">
                    {{-- <a href="{{ route('register.show') }}" class="btn btn-primary">
                        <i class="fa fa-user-plus me-2"></i>नवीन वापरकर्ता नोंदणी करा
                    </a> --}}
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                        <i class="fa fa-users me-2"></i>नोंदणीकृत वापरकर्ते
                    </a>
                </div>
            @endif

            {{-- District status summary — which districts reached 15 --}}
            <div class="row g-3 mb-5">
                @foreach ($districtCounts as $d)
                    <div class="col-md-3 col-sm-6">
                        <div class="card p-3 text-center {{ $d->total >= 15 ? 'border-success border-2' : '' }}">
                            <h5 class="mb-1">{{ $d->jilha }}</h5>
                            <h2 class="mb-1 {{ $d->total >= 15 ? 'text-success' : 'text-primary' }}">{{ $d->total }}
                            </h2>
                            @if ($d->total >= 15)
                                <span class="badge bg-success">✓ १५ सदस्य पूर्ण</span>
                            @else
                                <span class="badge bg-secondary">{{ 15 - $d->total }} बाकी</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Filters --}}
            <form method="GET" action="{{ route('members.index') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <select name="jilha" id="filter-jilha-select" class="form-select" style="width:100%;">
                        <option value="">सर्व जिल्हे</option>
                        @foreach ($allJilhas as $j)
                            <option value="{{ $j }}" {{ request('jilha') == $j ? 'selected' : '' }}>
                                {{ $j }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="taluka" value="{{ request('taluka') }}" class="form-control"
                        placeholder="तालुका">
                </div>
                <div class="col-md-3">
                    <select name="city" id="filter-city-select" class="form-select" style="width:100%;">
                        <option value="">सर्व शहरे</option>
                        @foreach ($allCities as $city)
                            <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                {{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="नाव / मोबाईल / ई-मेल शोधा">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-4">फिल्टर लावा</button>
                    <a href="{{ route('members.index') }}" class="btn btn-outline-secondary px-4">रीसेट</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table bg-dark text-light">
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

            {{ $members->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('#filter-jilha-select').select2({
            placeholder: 'सर्व जिल्हे',
            width: '100%'
        });
        $('#filter-city-select').select2({
            placeholder: 'सर्व शहरे',
            width: '100%'
        });
    });
</script>
