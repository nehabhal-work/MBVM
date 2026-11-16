@extends('layouts.erp')

@section('title', $tabs[$tab] ?? 'डॅशबोर्ड')

@section('sidebar')
    @php
        $tabIcons = [
            'dashboard' => 'fa-house',
            'members'   => 'fa-address-card',
            'districts' => 'fa-map-location-dot',
            'sandhi'    => 'fa-bullhorn',
            'banners'   => 'fa-images',
            'documents' => 'fa-file-lines',
            'settings'  => 'fa-users-gear',
        ];
    @endphp
    @foreach ($tabs as $key => $label)
        @if ($key === 'banners')
            <div class="erp-side__sep">वेबसाइट मजकूर</div>
        @elseif ($key === 'settings')
            <div class="erp-side__sep">प्रशासन</div>
        @endif
        <a href="{{ route('admin.users.index', ['tab' => $key]) }}" title="{{ $label }}"
            class="erp-side__link {{ $tab === $key ? 'is-active' : '' }}">
            <i class="fas {{ $tabIcons[$key] ?? 'fa-circle' }}"></i><span>{{ $label }}</span>
        </a>
    @endforeach
@endsection

@section('content')
    <style>
        .adm-hero {
            padding: clamp(40px, 6vw, 64px) 0;
            color: #fff;
            background: linear-gradient(120deg, #1d2940 0%, #33425d 48%, #d45d2c 100%);
        }

        .adm-hero__crumb {
            margin-bottom: 10px;
            color: rgba(255, 255, 255, .82);
            font-size: .95rem;
        }

        .adm-hero__crumb a {
            color: #fff;
        }

        .adm-hero h1 {
            margin: 0 0 10px;
            color: #fff;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
        }

        .adm-hero p {
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 1.05rem;
        }

        .adm {
            padding: 0;
            color: #1d2940;
        }

        .adm__notice {
            margin-bottom: 24px;
            padding: 14px 20px;
            border-left: 4px solid #d45d2c;
            border-radius: 8px;
            background: #f9ede7;
            color: #444;
        }

        .adm__tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .adm__tab {
            padding: 10px 22px;
            border: 1px solid #dfe3ea;
            border-radius: 999px;
            background: #fff;
            color: #1d2940;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .adm__tab:hover {
            border-color: #d45d2c;
            color: #d45d2c;
        }

        .adm__tab.is-active {
            background: #d45d2c;
            border-color: #d45d2c;
            color: #fff;
        }

        .adm__panel {
            padding: 24px;
            border: 1px solid #eceff4;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(29, 41, 64, .06);
        }

        .adm__filters {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1.3fr auto;
            gap: 12px;
            margin-bottom: 20px;
        }

        .adm__status {
            padding: 4px 26px 4px 12px;
            border: 1px solid transparent;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
        }

        .adm__status--verified { background-color: #e3f5ea; color: #1e7b45; border-color: #bfe6cd; }
        .adm__status--pending { background-color: #fff3d6; color: #9a6a00; border-color: #f3dc9e; }
        .adm__status--unverified { background-color: #f0f2f5; color: #697386; border-color: #dfe3ea; }

        .adm__badge--bad { background: #fde8e8; color: #b42318; }

        .adm__actions { display: flex; flex-wrap: wrap; gap: 8px; justify-content: flex-end; }
        .adm__actions form { margin: 0; }
        .adm__act {
            padding: 6px 16px; border: 1px solid #d45d2c; border-radius: 999px;
            background: #fff; color: #d45d2c; font-size: .88rem; font-weight: 600; white-space: nowrap;
        }
        .adm__act:hover { background: #fbeee8; }
        .adm__act--solid { background: #d45d2c; color: #fff; }
        .adm__act--solid:hover { background: #b94c21; }
        .adm__act--link { border-color: transparent; color: #697386; }
        .adm__detail { background: #fafbfc; font-size: .92rem; line-height: 1.8; }

        .adm__filters .form-control,
        .adm__filters .form-select {
            height: 48px;
            border-radius: 10px;
        }

        .adm__btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            height: 48px;
            padding: 0 22px;
            border: 0;
            border-radius: 999px;
            background: #d45d2c;
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .adm__btn:hover {
            background: #b94c21;
            color: #fff;
        }

        .adm__btn--ghost {
            background: #fff;
            border: 1px solid #dfe3ea;
            color: #1d2940;
        }

        .adm__btn--ghost:hover {
            background: #f5f6f9;
            color: #1d2940;
        }

        .adm__table {
            margin: 0;
        }

        .adm__table th {
            color: #697386;
            font-size: .9rem;
            font-weight: 600;
            border-bottom-width: 1px;
            white-space: nowrap;
        }

        .adm__table td {
            padding-top: 14px;
            padding-bottom: 14px;
            vertical-align: middle;
        }

        .adm__sub {
            display: block;
            color: #8a93a3;
            font-size: .85rem;
        }

        .adm__badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 600;
        }

        .adm__badge--ok {
            background: #e3f5ea;
            color: #1e7b45;
        }

        .adm__badge--wait {
            background: #fff3d6;
            color: #9a6a00;
        }

        .adm__badge--muted {
            background: #f0f2f5;
            color: #697386;
        }

        .adm__stats {
            margin-bottom: 24px;
        }

        .adm__stat {
            height: 100%;
            padding: 20px;
            border: 1px solid #eceff4;
            border-radius: 12px;
            background: #fff;
        }

        .adm__stat b {
            display: block;
            color: #d45d2c;
            font-size: 2rem;
            line-height: 1.1;
        }

        .adm__stat span {
            color: #697386;
        }

        .adm__grid2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .adm__h {
            margin-bottom: 16px;
            font-size: 1.15rem;
            font-weight: 700;
            color: #1d2940;
        }

        .adm__bar {
            height: 8px;
            border-radius: 99px;
            background: #f0f2f5;
            overflow: hidden;
        }

        .adm__bar i {
            display: block;
            height: 100%;
            background: #d45d2c;
        }

        .adm__empty {
            padding: 32px;
            text-align: center;
            color: #8a93a3;
        }

        @media (max-width: 991px) {
            .adm__filters {
                grid-template-columns: 1fr 1fr;
            }

            .adm__grid2 {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575px) {
            .adm__filters {
                grid-template-columns: 1fr;
            }

            .adm__panel {
                padding: 16px;
            }
        }
    </style>

    <section class="adm">
        <div>
            @if (in_array($tab, ['banners', 'documents', 'settings', 'dashboard', 'districts']))
                @if (session('success'))
                    <div class="alert alert-success py-2">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger py-2">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
                @endif
            @endif

            {{-- ================= DASHBOARD ================= --}}
            @if ($tab === 'dashboard')
                <div class="row g-3 adm__stats">
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $stats['members'] }}</b><span>एकूण नोंदण्या</span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $stats['verified'] }}</b><span>खात्री झालेल्या (Verified)</span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $stats['districts'] }}</b><span>संलग्न संघटना</span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $stats['pending'] }}</b><span>प्रलंबित सूची</span></div>
                    </div>
                </div>

                <div class="row g-3 adm__stats">
                    <div class="col-6 col-lg-3">
                        <a href="{{ route('admin.users.index', ['tab' => 'districts']) }}" class="text-reset text-decoration-none">
                            <div class="adm__stat"><b>{{ $organizationStats['districts'] }}</b><span>नोंदणी असलेले जिल्हे</span></div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <a href="{{ route('admin.users.index', ['tab' => 'sandhi']) }}" class="text-reset text-decoration-none">
                            <div class="adm__stat"><b>{{ $contentStats['sandhi_live'] }}</b><span>होम पेजवरील संधी (प्रलंबित {{ $contentStats['sandhi_pending'] }})</span></div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <a href="{{ route('admin.users.index', ['tab' => 'banners']) }}" class="text-reset text-decoration-none">
                            <div class="adm__stat"><b>{{ $contentStats['banners_active'] }} / {{ $contentStats['banners_total'] }}</b><span>सक्रिय होम बॅनर</span></div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3">
                        <a href="{{ route('admin.users.index', ['tab' => 'documents']) }}" class="text-reset text-decoration-none">
                            <div class="adm__stat"><b>{{ $contentStats['documents_active'] }} / {{ $contentStats['documents_total'] }}</b><span>प्रसिद्ध दस्तऐवज</span></div>
                        </a>
                    </div>
                </div>

                <div class="adm__grid2">
                    <div class="adm__panel">
                        <div class="adm__h">उद्दिष्टाजवळील भाग</div>
                        @forelse ($recentMembers as $m)
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <div>{{ $m->name }}<span class="adm__sub">{{ $m->jilha }} /
                                        {{ $m->taluka }}</span></div>
                                <small class="text-muted">{{ $m->created_at->format('d-m-Y') }}</small>
                            </div>
                        @empty
                            <div class="adm__empty">अद्याप नोंदणी नाही.</div>
                        @endforelse
                        <a href="{{ route('admin.users.index', ['tab' => 'members']) }}" class="d-inline-block mt-3">सर्व
                            नोंदण्या पहा →</a>
                    </div>

                    <div class="adm__panel">
                        <div class="adm__h">जिल्हानिहाय नोंदणी
</div>
                        @forelse ($businessTypeCounts as $row)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>{{ $row->business_type ?: '—' }}</span><b>{{ $row->total }}</b>
                                </div>
                                <div class="adm__bar"><i
                                        style="width: {{ $stats['members'] ? round(($row->total / $stats['members']) * 100) : 0 }}%"></i>
                                </div>
                            </div>
                        @empty
                            <div class="adm__empty">माहिती उपलब्ध नाही.</div>
                        @endforelse
                    </div>
                </div>
            @endif

            {{-- ================= MEMBERS (नोंदण्या) ================= --}}
            @if ($tab === 'members')
                <div class="adm__panel">
                    <form method="GET" action="{{ route('admin.users.index') }}" class="adm__filters">
                        <input type="hidden" name="tab" value="members">
                        <select name="jilha" class="form-select" onchange="this.form.submit()">
                            <option value="">सर्व जिल्हे</option>
                            @foreach ($allJilhas as $j)
                                <option value="{{ $j }}" @selected(request('jilha') === $j)>{{ $j }}
                                </option>
                            @endforeach
                        </select>
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">सर्व स्थिती</option>
                            @foreach (\App\Models\Member::STATUSES as $key => $label)
                                <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                       
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="नाव / मोबाईल / ई-मेल / कंपनी शोधा (Enter)">
                        <a href="{{ route('admin.members.export', request()->only('jilha', 'status', 'business_type', 'q')) }}"
                            class="adm__btn">CSV निर्यात</a>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success py-2">{{ session('success') }}</div>
                    @endif

                    @if (collect(request()->only('jilha', 'status', 'business_type', 'q'))->filter()->isNotEmpty())
                        <div class="mb-3 text-muted">
                            {{ $members->total() }} नोंदी सापडल्या ·
                            <a href="{{ route('admin.users.index', ['tab' => 'members']) }}">फिल्टर काढा</a>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table adm__table">
                            <thead>
                                <tr>
                                    <th>क्र.</th>
                                    <th>नाव</th>
                                    <th>मोबाईल</th>
                                    <th>जिल्हा / तालुका / शहर</th>
                                    <th>प्रकार</th>
                                    <th>कंपनी</th>
                                    <th>संपर्क संमती</th>
                                    <th>खात्री</th>
                                    <th>दिनांक</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($members as $m)
                                    <tr>
                                        <td>MB{{ 100000 + $m->id }}</td>
                                        <td>{{ $m->name }}<span class="adm__sub">{{ $m->email }}</span></td>
                                        <td>{{ $m->mobile }}</td>
                                        <td>{{ $m->jilha }} / {{ $m->taluka }} / {{ $m->city }}</td>
                                        <td>{{ $m->business_type ?: '—' }}</td>
                                        <td>{{ $m->company_name ?: '—' }}</td>
                                        <td>
                                            @if ($m->contact_consent)
                                                <span class="adm__badge adm__badge--ok">होय</span>
                                            @else
                                                <span class="adm__badge adm__badge--muted">नाही</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.members.status', $m) }}">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()"
                                                    class="adm__status adm__status--{{ $m->status }}"
                                                    aria-label="खात्री स्थिती बदला">
                                                    @foreach (\App\Models\Member::STATUSES as $key => $label)
                                                        <option value="{{ $key }}" @selected($m->status === $key)>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $m->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="adm__empty">कोणत्याही नोंदी सापडल्या नाहीत.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">{{ $members->links() }}</div>
                </div>
            @endif

            {{-- ================= DISTRICTS (स्थानिक संघटना) ================= --}}
            @if ($tab === 'districts')
                @php
                    $stateBadges = [
                        'forming'     => ['adm__badge--wait', 'संघटना स्थापनेची प्रक्रिया सुरू'],
                        'registering' => ['adm__badge--muted', 'इच्छुक सदस्य नोंदणी सुरू'],
                        'none'        => ['adm__badge--muted', 'नोंदणी नाही'],
                    ];
                    $currentState = request('state');
                @endphp

                <div class="row g-3 adm__stats">
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $organizationStats['districts'] }}</b><span>नोंदणी असलेले जिल्हे</span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $organizationStats['threshold_reached'] }}</b><span>नोंदणीचा टप्पा पूर्ण</span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $organizationStats['registering'] }}</b><span>नोंदणी सुरू असलेले जिल्हे</span></div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="adm__stat"><b>{{ $organizationStats['registrations'] }}</b><span>एकूण सदस्य नोंदणी</span></div>
                    </div>
                </div>
                <p class="text-muted small mb-3">
                    वरील आकडे मुख्यपृष्ठावरील “स्थानिक संघटना” विभागात जसेच्या तसे दिसतात (सदस्य नोंदणीवरून आपोआप मोजले जातात).
                    <a href="{{ route('home') }}#sanghatana" target="_blank">होम पेजवर पहा ↗</a>
                </p>

                <div class="adm__panel">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                        <div class="adm__h mb-0">स्थानिक संघटना — जिल्हानिहाय नोंदणी</div>
                        <small class="text-muted">संघटना स्थापनेसाठी किमान {{ $threshold }} नोंदण्या</small>
                    </div>

                    {{-- quick filters --}}
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @foreach (['' => ['सर्व जिल्हे', 'all'], 'forming' => ['स्थापना प्रक्रिया', 'forming'], 'registering' => ['नोंदणी सुरू', 'registering'], 'none' => ['नोंदणी नाही', 'none']] as $key => [$label, $countKey])
                            <a href="{{ route('admin.users.index', array_filter(['tab' => 'districts', 'state' => $key])) }}"
                                class="adm__tab py-1 px-3 {{ (string) $currentState === (string) $key ? 'is-active' : '' }}">
                                {{ $label }} ({{ $districtSummary[$countKey] }})
                            </a>
                        @endforeach
                    </div>

                    <div class="table-responsive">
                        <table class="table adm__table">
                            <thead>
                                <tr>
                                    <th>नाव</th>
                                    <th>जिल्हा</th>
                                    <th>स्थिती</th>
                                    <th>नोंदणी</th>
                                    <th style="min-width:140px">प्रगती</th>
                                    <th>Verified</th>
                                    <th>तालुके</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($districtRows as $i => $d)
                                    @php [$badgeClass, $badgeText] = $stateBadges[$d->state]; @endphp
                                    <tr>
                                        <td>
                                            मराठी बांधकाम व्यावसायिक संघटना, {{ $d->jilha }}
                                            @if ($d->state === 'forming')
                                                (स्थापना प्रक्रियेत)
                                            @elseif ($d->state === 'registering')
                                                (प्रस्तावित)
                                            @endif
                                            @if ($d->last_at)
                                                <span class="adm__sub">शेवटची नोंदणी: {{ $d->last_at->format('d-m-Y') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $d->jilha }}</td>
                                        <td><span class="adm__badge {{ $badgeClass }}">{{ $badgeText }}</span></td>
                                        <td><b>{{ $d->total }}</b></td>
                                        <td>
                                            <div class="adm__bar" title="{{ $d->total }} / {{ $threshold }}">
                                                <i style="width: {{ min(100, round(($d->total / $threshold) * 100)) }}%"></i>
                                            </div>
                                            <span class="adm__sub">{{ $d->total }} / {{ $threshold }}</span>
                                        </td>
                                        <td>{{ $d->verified }}</td>
                                        <td>{{ $d->talukas }}</td>
                                        <td class="text-end">
                                            @if ($d->total > 0)
                                                <button type="button" class="adm__act" data-bs-toggle="collapse"
                                                    data-bs-target="#jilha-{{ $i }}">नोंदी ({{ $d->total }})</button>
                                            @endif
                                        </td>
                                    </tr>

                                    @if ($d->total > 0)
                                        <tr class="collapse" id="jilha-{{ $i }}">
                                            <td colspan="8" class="adm__detail">
                                                <table class="table table-sm mb-2">
                                                    <thead>
                                                        <tr>
                                                            <th>क्र.</th>
                                                            <th>नाव</th>
                                                            <th>मोबाईल</th>
                                                            <th>तालुका / शहर</th>
                                                            <th>प्रकार</th>
                                                            <th>खात्री</th>
                                                            <th>दिनांक</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($membersByJilha->get($d->jilha, collect()) as $m)
                                                            <tr>
                                                                <td>MB{{ 100000 + $m->id }}</td>
                                                                <td>{{ $m->name }}</td>
                                                                <td>{{ $m->mobile }}</td>
                                                                <td>{{ $m->taluka }} / {{ $m->city }}</td>
                                                                <td>{{ $m->business_type ?: '—' }}</td>
                                                                <td>{{ \App\Models\Member::STATUSES[$m->status] ?? $m->status }}</td>
                                                                <td>{{ $m->created_at->format('d-m-Y') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <a href="{{ route('admin.users.index', ['tab' => 'members', 'jilha' => $d->jilha]) }}">
                                                    नोंदण्या टॅबमध्ये उघडा →</a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="8" class="adm__empty">या फिल्टरमध्ये कोणताही जिल्हा नाही.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- ================= SANDHI (संधी व जाहिराती) ================= --}}
            @if ($tab === 'sandhi')
                <div class="adm__panel">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                        <div class="adm__h mb-0">तपासणी रांग</div>
                        <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex gap-2">
                            <input type="hidden" name="tab" value="sandhi">
                            <select name="status" class="form-select" onchange="this.form.submit()" style="min-width:180px">
                                <option value="">सर्व स्थिती</option>
                                @foreach (\App\Models\SandhiListing::STATUSES as $key => $label)
                                    <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                            <a href="{{ route('sandhi.index') }}" target="_blank" class="adm__btn adm__btn--ghost">सार्वजनिक पान ↗</a>
                        </form>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success py-2">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-warning py-2">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table adm__table">
                            <thead>
                                <tr>
                                    <th>अर्जदार</th>
                                    <th>प्रकार</th>
                                    <th>भाग</th>
                                    <th>शुल्क</th>
                                    <th>स्थिती</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($listings as $l)
                                    @php
                                        $badge = match ($l->status) {
                                            'approved' => 'adm__badge--ok',
                                            'under_review' => 'adm__badge--wait',
                                            'rejected' => 'adm__badge--bad',
                                            default => 'adm__badge--muted',
                                        };
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $l->name }}
                                            <span class="adm__sub">{{ $l->mobile }} · {{ $l->email }}</span>
                                        </td>
                                        <td>{{ $l->type }}</td>
                                        <td>{{ $l->district }} · {{ $l->taluka }}</td>
                                        <td>
                                            {{ $l->fee !== null ? '₹' . number_format($l->fee) : '—' }} ·
                                            {{ $l->isPaid() ? 'Paid' : 'Unpaid' }}
                                            @if ($l->payment_ref)
                                                <span class="adm__sub">UTR {{ $l->payment_ref }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="adm__badge {{ $badge }}">
                                                {{ \App\Models\SandhiListing::STATUSES[$l->status] ?? $l->status }}
                                                @if ($l->status === 'approved' && $l->approved_until)
                                                    · {{ $l->approved_until->format('d-m-Y') }} पर्यंत
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <div class="adm__actions">
                                                @if (in_array($l->status, ['submitted', 'under_review', 'paused']))
                                                    <form method="POST" action="{{ route('admin.sandhi.approve', $l) }}">
                                                        @csrf @method('PATCH')
                                                        <button class="adm__act adm__act--solid">{{ $l->status === 'paused' ? 'पुन्हा Active करा' : 'मान्यता (होमवर दाखवा)' }}</button>
                                                    </form>
                                                @endif
                                                @if (in_array($l->status, ['submitted', 'under_review']))
                                                    <form method="POST" action="{{ route('admin.sandhi.reject', $l) }}"
                                                        onsubmit="return confirm('ही सूची नाकारायची?')">
                                                        @csrf @method('PATCH')
                                                        <button class="adm__act">नाकारा</button>
                                                    </form>
                                                @endif
                                                @if ($l->status === 'approved')
                                                    <form method="POST" action="{{ route('admin.sandhi.pause', $l) }}">
                                                        @csrf @method('PATCH')
                                                        <button class="adm__act" title="होम पेज व संधी पानावरून काढा">Inactive करा</button>
                                                    </form>
                                                @endif
                                                @if (!$l->isPaid() && $l->status !== 'rejected')
                                                    <form method="POST" action="{{ route('admin.sandhi.remind', $l) }}">
                                                        @csrf
                                                        <button class="adm__act">पेमेंट स्मरण</button>
                                                    </form>
                                                    <button type="button" class="adm__act" data-bs-toggle="collapse"
                                                        data-bs-target="#paid-{{ $l->id }}">Paid नोंदवा</button>
                                                @endif
                                                <button type="button" class="adm__act adm__act--link" data-bs-toggle="collapse"
                                                    data-bs-target="#detail-{{ $l->id }}">तपशील</button>
                                            </div>
                                        </td>
                                    </tr>

                                    @if (!$l->isPaid() && $l->status !== 'rejected')
                                        <tr class="collapse" id="paid-{{ $l->id }}">
                                            <td colspan="6">
                                                <form method="POST" action="{{ route('admin.sandhi.paid', $l) }}"
                                                    class="d-flex flex-wrap gap-2 align-items-center">
                                                    @csrf @method('PATCH')
                                                    <input type="number" name="fee" min="0" required class="form-control"
                                                        style="max-width:160px" placeholder="शुल्क ₹" value="{{ $l->fee }}">
                                                    <input type="text" name="payment_ref" class="form-control"
                                                        style="max-width:240px" placeholder="UTR / पावती क्र.">
                                                    <button class="adm__act adm__act--solid">जतन करा</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif

                                    <tr class="collapse" id="detail-{{ $l->id }}">
                                        <td colspan="6" class="adm__detail">
                                            <div><b>ठिकाण:</b> {{ $l->location }} · <b>क्षेत्र:</b> {{ $l->area }}
                                                @if ($l->map_url)
                                                    · <a href="{{ $l->map_url }}" target="_blank" rel="noopener noreferrer">नकाशा ↗</a>
                                                @endif
                                            </div>
                                            <div><b>प्रस्ताव:</b> {{ $l->brief }}</div>
                                            @if ($l->terms)
                                                <div><b>अपेक्षित अटी:</b> {{ $l->terms }}</div>
                                            @endif
                                            @if (!empty($l->documents))
                                                <div><b>कागदपत्रे:</b>
                                                    @foreach ($l->documents as $i => $path)
                                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" rel="noopener">फाईल {{ $i + 1 }}</a>@if (!$loop->last), @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="adm__sub">सादर: {{ $l->created_at->format('d-m-Y H:i') }}</div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="adm__empty">अद्याप कोणतीही संधी सादर झालेली नाही.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">{{ $listings->links() }}</div>
                </div>
            @endif

            {{-- ================= HOME BANNERS ================= --}}
            @if ($tab === 'banners')
                <div class="adm__panel mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                        <div class="adm__h mb-0">नवीन होम बॅनर जोडा</div>
                        <a href="{{ route('home') }}" target="_blank" class="adm__btn adm__btn--ghost">होम पेज पहा ↗</a>
                    </div>
                    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data"
                        class="row g-3 align-items-end">
                        @csrf
                        <div class="col-lg-5">
                            <label class="form-label fw-semibold">बॅनर हेडिंग *</label>
                            <input type="text" name="heading" class="form-control" maxlength="255" required
                                value="{{ old('heading') }}" placeholder="उदा. एकत्रित बळ, एकत्रित आवाज">
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">बॅनर प्रतिमा * <small class="text-muted">(JPG/PNG/WEBP, ५ MB, शिफारस 1920×800)</small></label>
                            <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp" required>
                        </div>
                        <div class="col-6 col-lg-1">
                            <label class="form-label fw-semibold">क्रम</label>
                            <input type="number" name="sort_order" class="form-control" min="0" max="999"
                                value="{{ old('sort_order') }}" placeholder="—">
                        </div>
                        <div class="col-6 col-lg-2">
                            <button type="submit" class="adm__btn w-100">+ बॅनर जोडा</button>
                        </div>
                    </form>
                </div>

                <div class="adm__panel">
                    <div class="adm__h">सर्व बॅनर <small class="text-muted fw-normal">— फक्त Active बॅनर मुख्यपृष्ठावर (क्रमानुसार) दिसतात</small></div>
                    <div class="table-responsive">
                        <table class="table adm__table align-middle">
                            <thead>
                                <tr>
                                    <th>क्रम</th>
                                    <th>प्रतिमा</th>
                                    <th>हेडिंग</th>
                                    <th>स्थिती</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->sort_order }}</td>
                                        <td>
                                            <img src="{{ $banner->image_url }}" alt=""
                                                style="width:140px;height:60px;object-fit:cover;border-radius:8px">
                                        </td>
                                        <td style="max-width:420px">{{ $banner->heading }}</td>
                                        <td>
                                            <span class="adm__badge {{ $banner->is_active ? 'adm__badge--ok' : 'adm__badge--muted' }}">
                                                {{ $banner->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="adm__actions">
                                                <form method="POST" action="{{ route('admin.banners.toggle', $banner) }}">
                                                    @csrf @method('PATCH')
                                                    <button class="adm__act {{ $banner->is_active ? '' : 'adm__act--solid' }}">
                                                        {{ $banner->is_active ? 'Inactive करा' : 'Active करा' }}
                                                    </button>
                                                </form>
                                                <button type="button" class="adm__act" data-bs-toggle="collapse"
                                                    data-bs-target="#banner-edit-{{ $banner->id }}">बदला</button>
                                                <form method="POST" action="{{ route('admin.banners.destroy', $banner) }}"
                                                    onsubmit="return confirm('हा बॅनर कायमचा हटवायचा?')">
                                                    @csrf @method('DELETE')
                                                    <button class="adm__act adm__act--link">हटवा</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="banner-edit-{{ $banner->id }}">
                                        <td colspan="5" class="adm__detail">
                                            <form method="POST" action="{{ route('admin.banners.update', $banner) }}"
                                                enctype="multipart/form-data" class="row g-2 align-items-end">
                                                @csrf @method('PUT')
                                                <div class="col-lg-5">
                                                    <label class="form-label">हेडिंग</label>
                                                    <input type="text" name="heading" class="form-control" maxlength="255" required
                                                        value="{{ $banner->heading }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">नवीन प्रतिमा (बदलायची असल्यास)</label>
                                                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                                                </div>
                                                <div class="col-6 col-lg-1">
                                                    <label class="form-label">क्रम</label>
                                                    <input type="number" name="sort_order" class="form-control" min="0" max="999"
                                                        value="{{ $banner->sort_order }}">
                                                </div>
                                                <div class="col-6 col-lg-2">
                                                    <button type="submit" class="adm__btn w-100">जतन करा</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="adm__empty">अद्याप बॅनर नाही. वर नवीन बॅनर जोडा.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- ================= DOCUMENTS (दस्तऐवज) ================= --}}
            @if ($tab === 'documents')
                <div class="adm__panel mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                        <div class="adm__h mb-0">नवीन दस्तऐवज जोडा</div>
                        <a href="{{ route('documents.index') }}" target="_blank" class="adm__btn adm__btn--ghost">दस्तऐवज पान पहा ↗</a>
                    </div>
                    <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold">शीर्षक *</label>
                            <input type="text" name="title" class="form-control" maxlength="255" required value="{{ old('title') }}">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">प्रकार (आयकॉन)</label>
                            <select name="icon" class="form-select">
                                @foreach (\App\Models\Document::ICONS as $icon => $label)
                                    <option value="{{ $icon }}" @selected(old('icon') === $icon)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">फाईल <small class="text-muted">(PDF/DOC, १० MB)</small></label>
                            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label fw-semibold">क्रम</label>
                            <input type="number" name="sort_order" class="form-control" min="0" max="999" value="{{ old('sort_order') }}">
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label fw-semibold">थोडक्यात माहिती</label>
                            <textarea name="description" class="form-control" rows="2" maxlength="1000">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">फाईल नसल्यास दाखवायचा मजकूर</label>
                            <input type="text" name="pending_label" class="form-control" maxlength="100"
                                value="{{ old('pending_label', 'मंजुरीनंतर उपलब्ध') }}">
                        </div>
                        <div class="col-lg-2 d-flex align-items-end">
                            <button type="submit" class="adm__btn w-100">+ जोडा</button>
                        </div>
                    </form>
                </div>

                <div class="adm__panel">
                    <div class="adm__h">सर्व दस्तऐवज <small class="text-muted fw-normal">— फक्त Active दस्तऐवज “दस्तऐवज” पानावर दिसतात</small></div>
                    <div class="table-responsive">
                        <table class="table adm__table align-middle">
                            <thead>
                                <tr>
                                    <th>क्रम</th>
                                    <th>शीर्षक</th>
                                    <th>फाईल</th>
                                    <th>स्थिती</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($documents as $doc)
                                    <tr>
                                        <td>{{ $doc->sort_order }}</td>
                                        <td>
                                            <i class="fas {{ $doc->icon }} me-1 text-muted"></i> {{ $doc->title }}
                                            <span class="adm__sub">{{ \Illuminate\Support\Str::limit($doc->description, 90) }}</span>
                                        </td>
                                        <td>
                                            @if ($doc->file)
                                                <a href="{{ $doc->file_url }}" target="_blank" rel="noopener">फाईल पहा ↗</a>
                                            @else
                                                <span class="adm__badge adm__badge--wait">{{ $doc->pending_label }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="adm__badge {{ $doc->is_active ? 'adm__badge--ok' : 'adm__badge--muted' }}">
                                                {{ $doc->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="adm__actions">
                                                <form method="POST" action="{{ route('admin.documents.toggle', $doc) }}">
                                                    @csrf @method('PATCH')
                                                    <button class="adm__act {{ $doc->is_active ? '' : 'adm__act--solid' }}">
                                                        {{ $doc->is_active ? 'Inactive करा' : 'Active करा' }}
                                                    </button>
                                                </form>
                                                <button type="button" class="adm__act" data-bs-toggle="collapse"
                                                    data-bs-target="#doc-edit-{{ $doc->id }}">बदला</button>
                                                <form method="POST" action="{{ route('admin.documents.destroy', $doc) }}"
                                                    onsubmit="return confirm('हा दस्तऐवज कायमचा हटवायचा?')">
                                                    @csrf @method('DELETE')
                                                    <button class="adm__act adm__act--link">हटवा</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="doc-edit-{{ $doc->id }}">
                                        <td colspan="5" class="adm__detail">
                                            <form method="POST" action="{{ route('admin.documents.update', $doc) }}"
                                                enctype="multipart/form-data" class="row g-2">
                                                @csrf @method('PUT')
                                                <div class="col-lg-4">
                                                    <label class="form-label">शीर्षक</label>
                                                    <input type="text" name="title" class="form-control" maxlength="255" required value="{{ $doc->title }}">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label">प्रकार (आयकॉन)</label>
                                                    <select name="icon" class="form-select">
                                                        @foreach (\App\Models\Document::ICONS as $icon => $label)
                                                            <option value="{{ $icon }}" @selected($doc->icon === $icon)>{{ $label }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label">नवीन फाईल</label>
                                                    <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
                                                    @if ($doc->file)
                                                        <label class="small mt-1"><input type="checkbox" name="remove_file" value="1"> सध्याची फाईल काढा</label>
                                                    @endif
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">क्रम</label>
                                                    <input type="number" name="sort_order" class="form-control" min="0" max="999" value="{{ $doc->sort_order }}">
                                                </div>
                                                <div class="col-lg-7">
                                                    <label class="form-label">थोडक्यात माहिती</label>
                                                    <textarea name="description" class="form-control" rows="2" maxlength="1000">{{ $doc->description }}</textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label">फाईल नसल्यास मजकूर</label>
                                                    <input type="text" name="pending_label" class="form-control" maxlength="100" value="{{ $doc->pending_label }}">
                                                </div>
                                                <div class="col-lg-2 d-flex align-items-end">
                                                    <button type="submit" class="adm__btn w-100">जतन करा</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="adm__empty">अद्याप दस्तऐवज नाही.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- ================= SETTINGS: users & staff (super admin only) ================= --}}
            @if ($tab === 'settings')
                <div class="adm__panel mb-4">
                    <div class="adm__h">नवीन ERP लॉगिन तयार करा <small class="text-muted fw-normal">— प्रत्येक स्टाफ सदस्याला स्वतःचा ID (ई-मेल) व पासवर्ड</small></div>
                    <form method="POST" action="{{ route('admin.staff.store') }}" class="row g-3 align-items-end" autocomplete="off">
                        @csrf
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">नाव *</label>
                            <input type="text" name="name" class="form-control" required maxlength="150" value="{{ old('name') }}">
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label fw-semibold">लॉगिन ID (ई-मेल) *</label>
                            <input type="email" name="email" class="form-control" required maxlength="150" value="{{ old('email') }}">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label fw-semibold">पासवर्ड * <small class="text-muted">(किमान ८)</small></label>
                            <input type="password" name="password" class="form-control" required minlength="8" autocomplete="new-password">
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label fw-semibold">भूमिका</label>
                            <select name="role" class="form-select">
                                @foreach (\App\Models\User::ROLES as $key => $label)
                                    <option value="{{ $key }}" @selected(old('role', 'admin') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="adm__btn w-100">+ लॉगिन तयार करा</button>
                        </div>
                    </form>
                    <p class="text-muted small mt-3 mb-0">
                        <b>सुपर अ‍ॅडमिन</b> — संपूर्ण ERP + लॉगिन/भूमिका व्यवस्थापन ·
                        <b>अ‍ॅडमिन (स्टाफ)</b> — नोंदण्या, संघटना, संधी, बॅनर, दस्तऐवज ·
                        <b>सदस्य</b> — फक्त वेबसाइट (ERP प्रवेश नाही)
                    </p>
                </div>

                <div class="adm__panel">
                    <div class="adm__h">लॉगिन वापरकर्ते</div>
                    <form method="GET" action="{{ route('admin.users.index') }}" class="d-flex flex-wrap gap-2 mb-3">
                        <input type="hidden" name="tab" value="settings">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            style="max-width:320px;height:48px;border-radius:10px" placeholder="नाव / ई-मेल शोधा">
                        <select name="role" class="form-select" style="max-width:220px;height:48px;border-radius:10px">
                            <option value="">सर्व भूमिका</option>
                            @foreach (\App\Models\User::ROLES as $key => $label)
                                <option value="{{ $key }}" @selected(request('role') === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="adm__btn">शोधा</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table adm__table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>नाव / लॉगिन ID</th>
                                    <th>भूमिका</th>
                                    <th>ई-मेल पडताळणी</th>
                                    <th>नोंदणी दिनांक</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $i => $user)
                                    @php $isSelf = $user->is(auth()->user()); @endphp
                                    <tr>
                                        <td>{{ $users->firstItem() + $i }}</td>
                                        <td>
                                            {{ $user->name }} @if ($isSelf)<small class="text-muted">(तुम्ही)</small>@endif
                                            <span class="adm__sub">{{ $user->email }}</span>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.staff.role', $user) }}" class="m-0">
                                                @csrf @method('PATCH')
                                                <select name="role" class="form-select form-select-sm" style="min-width:170px"
                                                    onchange="if (confirm(@js($user->name . ' ची भूमिका बदलायची?'))) this.form.submit(); else this.value='{{ $user->role }}';"
                                                    @disabled($isSelf)>
                                                    @foreach (\App\Models\User::ROLES as $key => $label)
                                                        <option value="{{ $key }}" @selected($user->role === $key)>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            @if ($user->email_verified_at)
                                                <span class="adm__badge adm__badge--ok">Verified</span>
                                            @else
                                                <span class="adm__badge adm__badge--wait">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at?->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <div class="adm__actions">
                                                <button type="button" class="adm__act" data-bs-toggle="collapse"
                                                    data-bs-target="#pw-{{ $user->id }}">पासवर्ड बदला</button>
                                                @unless ($isSelf)
                                                    <form method="POST" action="{{ route('admin.staff.destroy', $user) }}"
                                                        onsubmit="return confirm(@js($user->name . ' चे लॉगिन हटवायचे?'))">
                                                        @csrf @method('DELETE')
                                                        <button class="adm__act adm__act--link">हटवा</button>
                                                    </form>
                                                @endunless
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="collapse" id="pw-{{ $user->id }}">
                                        <td colspan="6" class="adm__detail">
                                            <form method="POST" action="{{ route('admin.staff.password', $user) }}"
                                                class="d-flex flex-wrap gap-2 align-items-center" autocomplete="off">
                                                @csrf @method('PATCH')
                                                <input type="password" name="password" class="form-control" style="max-width:260px"
                                                    minlength="8" required placeholder="नवीन पासवर्ड (किमान ८)" autocomplete="new-password">
                                                <button type="submit" class="adm__btn">जतन करा</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="adm__empty">कोणतेही वापरकर्ते सापडले नाहीत.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">{{ $users->links() }}</div>
                </div>
            @endif
        </div>
    </section>
@endsection
