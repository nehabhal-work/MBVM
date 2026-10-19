<style>
    #sanghatana {
        --organization-navy: #1d2940;
        --organization-orange: #d45d2c;
        padding: 72px 0;
        background: #f7f8fa;
    }

    #sanghatana .organization-eyebrow {
        color: var(--organization-orange);
        font-weight: 700;
        letter-spacing: .04em;
    }

    #sanghatana .organization-heading {
        color: var(--organization-navy);
        font-weight: 700;
    }

    #sanghatana .organization-map-panel,
    #sanghatana .organization-stat,
    #sanghatana .organization-card {
        height: 100%;
        background: #fff;
        border: 1px solid #e8ebf0;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(29, 41, 64, .06);
    }

    #sanghatana .organization-map-panel {
        padding: clamp(16px, 3vw, 30px);
    }

    #sanghatana .organization-map {
        width: 100%;
        max-height: 440px;
        object-fit: contain;
    }

    #sanghatana .organization-stat {
        min-height: 132px;
        padding: 20px;
        border-top: 3px solid var(--organization-orange);
    }

    #sanghatana .organization-stat__value {
        display: block;
        margin-bottom: 5px;
        color: var(--organization-navy);
        font-size: clamp(1.7rem, 3vw, 2.2rem);
        font-weight: 700;
        line-height: 1.2;
    }

    #sanghatana .organization-stat__label {
        color: #626c7c;
        line-height: 1.5;
    }

    #sanghatana .organization-directory {
        margin-top: 52px;
    }

    #sanghatana .organization-filters {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr)) auto;
        gap: 14px;
        margin: 24px 0 18px;
        padding: 20px;
        background: #fff;
        border: 1px solid #e8ebf0;
        border-radius: 14px;
    }

    #sanghatana .organization-filter label {
        display: block;
        margin-bottom: 7px;
        color: var(--organization-navy);
        font-size: .92rem;
        font-weight: 600;
    }

    #sanghatana .organization-filter select {
        min-height: 48px;
        border-radius: 9px;
    }

    #sanghatana .organization-directory__meta {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 12px;
        color: #626c7c;
        font-size: .95rem;
    }

    #sanghatana .organization-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    #sanghatana .organization-card {
        padding: 22px;
        border-left: 4px solid var(--organization-orange);
    }

    #sanghatana .organization-card__title {
        margin: 0;
        color: var(--organization-navy);
        font-size: 1.2rem;
        font-weight: 700;
    }

    #sanghatana .organization-card__status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 12px;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: .86rem;
        font-weight: 600;
    }

    #sanghatana .organization-card__status--active {
        color: #795015;
        background: #fff4d8;
    }

    #sanghatana .organization-card__status--reached {
        color: #176344;
        background: #e8f6ef;
    }

    #sanghatana .organization-card__locations {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        margin-top: 15px;
    }

    #sanghatana .organization-card__location {
        padding: 5px 10px;
        color: #4b5565;
        background: #f1f3f6;
        border-radius: 999px;
        font-size: .88rem;
    }

    #sanghatana .organization-card__count {
        margin: 12px 0 0;
        color: #626c7c;
        font-size: .92rem;
    }

    #sanghatana .organization-empty {
        grid-column: 1 / -1;
        padding: 28px;
        color: #626c7c;
        background: #fff;
        border: 1px dashed #cbd1da;
        border-radius: 14px;
        text-align: center;
    }

    #sanghatana .organization-websites {
        margin-top: 34px;
        padding: 24px;
        background: #fff;
        border: 1px solid #e8ebf0;
        border-radius: 14px;
    }

    #sanghatana .organization-websites h3 {
        color: var(--organization-navy);
        font-size: 1.2rem;
        font-weight: 700;
    }

    #sanghatana .organization-websites p {
        margin: 0;
        color: #626c7c;
        line-height: 1.7;
    }

    @media (max-width: 767px) {
        #sanghatana {
            padding: 52px 0;
        }

        #sanghatana .organization-filters,
        #sanghatana .organization-grid {
            grid-template-columns: 1fr;
        }

        #sanghatana .organization-directory__meta {
            flex-direction: column;
            gap: 4px;
        }
    }
</style>

<section id="sanghatana" aria-labelledby="organization-heading">
    <div class="container">
        <header class="text-center mx-auto mb-5" style="max-width:760px">
            <span class="organization-eyebrow">स्थानिक संघटना</span>
            <h2 class="organization-heading display-6 mb-3 mt-2" id="organization-heading">
                राज्यभरातील स्थानिक संघटना
            </h2>
            <p class="text-muted mb-0">
                महाराष्ट्रातील जिल्हानिहाय सदस्य नोंदणी आणि स्थानिक विकासकांचा सहभाग.
            </p>
        </header>

        <div class="row align-items-stretch g-4">
            <div class="col-lg-7">
                <div class="organization-map-panel text-center">
                    <img src="{{ asset('img/map.png') }}" class="organization-map"
                        alt="महाराष्ट्राचा नकाशा">
                    <p class="text-muted mb-0 mt-2">जिल्हानिहाय नोंदणीची माहिती खाली पहा.</p>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="row g-3 h-100">
                    <div class="col-6">
                        <article class="organization-stat">
                            <span class="organization-stat__value">{{ number_format($organizationStats['districts']) }}</span>
                            <span class="organization-stat__label">नोंदणी असलेले जिल्हे</span>
                        </article>
                    </div>
                    <div class="col-6">
                        <article class="organization-stat">
                            <span class="organization-stat__value">{{ number_format($organizationStats['threshold_reached']) }}</span>
                            <span class="organization-stat__label">नोंदणीचा टप्पा पूर्ण</span>
                        </article>
                    </div>
                    <div class="col-6">
                        <article class="organization-stat">
                            <span class="organization-stat__value">{{ number_format($organizationStats['registering']) }}</span>
                            <span class="organization-stat__label">नोंदणी सुरू असलेले जिल्हे</span>
                        </article>
                    </div>
                    <div class="col-6">
                        <article class="organization-stat">
                            <span class="organization-stat__value">{{ number_format($organizationStats['registrations']) }}</span>
                            <span class="organization-stat__label">एकूण सदस्य नोंदणी</span>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <div class="organization-directory" aria-labelledby="organization-directory-heading">
            <div class="d-flex flex-wrap align-items-end justify-content-between gap-2">
                <div>
                    <span class="organization-eyebrow">जिल्हानिहाय माहिती</span>
                    <h3 class="organization-heading h3 mb-0 mt-1" id="organization-directory-heading">
                        आपल्या भागातील नोंदणी
                    </h3>
                </div>
                <a href="{{ route('members.create') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="fas fa-user-plus me-1" aria-hidden="true"></i>
                    नोंदणी करा
                </a>
            </div>

            <form class="organization-filters" method="GET" action="{{ route('home') }}"
                aria-label="जिल्हानिहाय नोंदणी फिल्टर">
                <div class="organization-filter">
                    <label for="organization-district">जिल्हा</label>
                    <select class="form-select" id="organization-district" name="district">
                        <option value="">सर्व जिल्हे</option>
                        @foreach ($districtOptions as $districtOption)
                            <option value="{{ $districtOption }}" @selected($selectedDistrict === $districtOption)>
                                {{ $districtOption }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="organization-filter">
                    <label for="organization-taluka">तालुका</label>
                    <select class="form-select" id="organization-taluka" name="taluka">
                        <option value="">सर्व तालुके</option>
                        @foreach ($talukaOptions as $talukaOption)
                            <option value="{{ $talukaOption }}" @selected($selectedTaluka === $talukaOption)>
                                {{ $talukaOption }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="organization-filter">
                    <label for="organization-status">नोंदणी स्थिती</label>
                    <select class="form-select" id="organization-status" name="status">
                        <option value="">सर्व स्थिती</option>
                        <option value="threshold-reached" @selected($selectedStatus === 'threshold-reached')>
                            नोंदणीचा टप्पा पूर्ण
                        </option>
                        <option value="registering" @selected($selectedStatus === 'registering')>
                            नोंदणी सुरू
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill px-4">शोधा</button>
            </form>

            <div class="organization-directory__meta">
                <span>नोंदणीची माहिती जिल्हा व तालुकानिहाय एकत्रित स्वरूपात दाखवली आहे.</span>
                <span aria-live="polite">{{ number_format($visibleDistricts->count()) }} जिल्हे</span>
            </div>

            <div class="organization-grid" id="organization-directory-list">
                @forelse ($visibleDistricts as $district)
                    <article class="organization-card">
                        <h4 class="organization-card__title">{{ $district['name'] }} जिल्हा</h4>
                        @if ($district['status'] === 'threshold-reached')
                            <span class="organization-card__status organization-card__status--reached">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                नोंदणीचा टप्पा पूर्ण
                            </span>
                            <p class="organization-card__count">
                                एकूण नोंदणी: {{ number_format($district['registration_count']) }}
                            </p>
                        @else
                            <span class="organization-card__status organization-card__status--active">
                                <i class="fas fa-hourglass-half" aria-hidden="true"></i>
                                नोंदणी सुरू
                            </span>
                        @endif

                        @if ($district['talukas']->isNotEmpty())
                            <div class="organization-card__locations" aria-label="नोंदणी असलेले तालुके">
                                @foreach ($district['talukas'] as $taluka)
                                    <span class="organization-card__location">{{ $taluka }}</span>
                                @endforeach
                            </div>
                        @endif
                    </article>
                @empty
                    <div class="organization-empty">
                        <i class="fas fa-map-marked-alt mb-2" aria-hidden="true"></i>
                        <p class="mb-3">
                            @if ($districtDirectory->isEmpty())
                                अद्याप कोणत्याही जिल्ह्यात सदस्य नोंदणी झालेली नाही.
                            @else
                                निवडलेल्या फिल्टरशी जुळणारे जिल्हे सापडले नाहीत.
                            @endif
                        </p>
                        <a href="{{ route('members.create') }}" class="btn btn-primary rounded-pill px-4">
                            आपल्या भागात नोंदणी करा
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="organization-websites">
                <h3>संलग्न स्थानिक संघटनांच्या वेबसाइट्स</h3>
                <p>
                    संलग्न संघटनांची पडताळलेली यादी व वेबसाइटचे दुवे उपलब्ध झाल्यानंतर येथे प्रकाशित केले जातील.
                </p>
            </div>
        </div>
    </div>
</section>
