@extends('layouts.master')

@section('content')
    <style>
        .sandhi-page-hero {
            padding: clamp(48px, 7vw, 78px) 0;
            color: #fff;
            background: linear-gradient(120deg, #1d2940 0%, #33425d 48%, #d45d2c 100%);
        }

        .sandhi-page-hero__breadcrumb {
            margin-bottom: 14px;
            color: rgba(255, 255, 255, .82);
        }

        .sandhi-page-hero__breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .sandhi-page-hero__title {
            margin: 0 0 12px;
            color: #fff;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
        }

        .sandhi-page-hero__intro {
            max-width: 760px;
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .sandhi-page {
            padding: 48px 0 72px;
            color: #1d2940;
        }

        .sandhi-page__disclaimer {
            margin-bottom: 24px;
            padding: 16px 20px;
            border-left: 4px solid #d45d2c;
            border-radius: 8px;
            background: #f9ede7;
            color: #444;
            line-height: 1.7;
        }

        .sandhi-page__tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 22px;
            border-bottom: 1px solid #eee;
        }

        .sandhi-page__tab {
            padding: 12px 18px;
            border: 0;
            border-bottom: 3px solid transparent;
            background: transparent;
            color: #697386;
            font: inherit;
            font-weight: 600;
        }

        .sandhi-page__tab[aria-selected="true"] {
            border-bottom-color: #d45d2c;
            color: #d45d2c;
        }

        .sandhi-page__grid {
            display: grid;
            gap: 18px;
        }

        .sandhi-page__grid--two {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .sandhi-page__grid--three {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .sandhi-page__card {
            position: relative;
            padding: 22px;
            border: 1px solid #eee;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
        }

        .sandhi-page__tag {
            display: inline-flex;
            padding: 5px 11px;
            border: 1px solid #d45d2c;
            border-radius: 999px;
            color: #d45d2c;
            font-size: .88rem;
            font-weight: 600;
        }

        .sandhi-page__project-image {
            display: grid;
            min-height: 190px;
            margin: 14px 0;
            place-items: center;
            border-radius: 9px;
            background: linear-gradient(145deg, #fff7f1, #f2d9ca);
            color: #697386;
        }

        .sandhi-page__card h3 {
            margin: 0 0 8px;
            color: #1d2940;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .sandhi-page__muted {
            margin: 0;
            color: #697386;
            font-size: .95rem;
            line-height: 1.65;
        }

        .sandhi-page__listing {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .sandhi-page__listing time {
            color: #697386;
            font-size: .9rem;
        }

        .sandhi-page__ad-placeholder {
            display: grid;
            min-height: 230px;
            place-content: center;
            border: 1px dashed #d45d2c;
            text-align: center;
        }

        .sandhi-page__form-section {
            padding-top: 52px;
            scroll-margin-top: 90px;
        }

        .sandhi-page__section-title {
            margin: 0 0 8px;
            color: #1d2940;
            font-weight: 700;
        }

        .sandhi-page__lead {
            margin: 0 0 22px;
            color: #555;
            font-size: 17px;
            line-height: 1.7;
        }

        .sandhi-page__form {
            max-width: 860px;
            margin: 0 auto;
        }

        .sandhi-page__form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .sandhi-page__field {
            display: grid;
            gap: 6px;
            min-width: 0;
        }

        .sandhi-page__field--full {
            grid-column: 1 / -1;
        }

        .sandhi-page__field label {
            color: #1d2940;
            font-weight: 600;
        }

        .sandhi-page__field input:not([type="checkbox"]),
        .sandhi-page__field select,
        .sandhi-page__field textarea {
            width: 100%;
            min-height: 48px;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 7px;
            background: #fff;
            color: #1d2940;
            font: inherit;
        }

        .sandhi-page__field textarea {
            min-height: 110px;
            resize: vertical;
        }

        .sandhi-page__check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .sandhi-page__check input {
            margin-top: 6px;
        }

        .sandhi-page__submit {
            padding: 11px 22px;
            border: 0;
            border-radius: 999px;
            background: #d45d2c;
            color: #fff;
            font: inherit;
            font-weight: 700;
        }

        .sandhi-page__status {
            margin: 18px 0 0;
            padding: 14px 16px;
            border-radius: 8px;
            background: #e8f4ec;
            color: #285d38;
            line-height: 1.6;
        }

        .sandhi-page__status[hidden],
        .sandhi-page__panel[hidden] {
            display: none;
        }

        @media (max-width: 767.98px) {
            .sandhi-page {
                padding: 32px 0 52px;
            }

            .sandhi-page__grid--two,
            .sandhi-page__grid--three {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 575.98px) {
            .sandhi-page__form-grid {
                grid-template-columns: 1fr;
            }

            .sandhi-page__field--full {
                grid-column: auto;
            }
        }
    </style>

    <header class="sandhi-page-hero">
        <div class="container">
            <div class="sandhi-page-hero__breadcrumb">
                <a href="{{ route('home') }}">मुख्यपृष्ठ</a>
                <span aria-hidden="true"> / </span>
                <span aria-current="page">जाहिरात / व्यावसायिक संधी</span>
            </div>
            <h1 class="sandhi-page-hero__title">जाहिरात / व्यावसायिक संधी</h1>
            <p class="sandhi-page-hero__intro">संयुक्त विकास (JV / JD) संधी व विकासक प्रकल्प जाहिराती</p>
        </div>
    </header>

    <main class="sandhi-page">
        <div class="container">
            <p class="sandhi-page__disclaimer">
                या सूची महासंघाने पडताळलेल्या नाहीत; व्यवहारापूर्वी स्वतंत्र कायदेशीर तपासणी करावी. महासंघ केवळ सूची
                प्रसिद्ध करणारे व्यासपीठ आहे, व्यवहारात मध्यस्थ नाही.
            </p>

            <div class="sandhi-page__tabs" role="tablist" aria-label="संधी आणि जाहिराती">
                <button class="sandhi-page__tab" id="sandhi-tab-jv" type="button" role="tab"
                    aria-controls="sandhi-panel-jv" aria-selected="true">संयुक्त विकास संधी (JV / JD)</button>
                <button class="sandhi-page__tab" id="sandhi-tab-ad" type="button" role="tab"
                    aria-controls="sandhi-panel-ad" aria-selected="false">प्रकल्प जाहिराती</button>
            </div>

            <section class="sandhi-page__panel" id="sandhi-panel-jv" role="tabpanel"
                aria-labelledby="sandhi-tab-jv">
                <div class="sandhi-page__grid sandhi-page__grid--two">
                    @foreach ($listings as $listing)
                        <article class="sandhi-page__card sandhi-page__listing">
                            <span class="sandhi-page__tag">{{ $listing->type }}</span>
                            <time datetime="{{ $listing->created_at->toDateString() }}">{{ $listing->created_at->format('d-m-Y') }}</time>
                            <h3>{{ $listing->district }} · {{ $listing->taluka }} · {{ $listing->area }}</h3>
                            <p class="sandhi-page__muted">{{ \Illuminate\Support\Str::limit($listing->brief, 160) }}</p>
                        </article>
                    @endforeach
                    <article class="sandhi-page__card sandhi-page__listing">
                        <span class="sandhi-page__tag">जमीन JV/JD साठी उपलब्ध</span>
                        <time datetime="2026-10-01">०१ ऑक्टोबर २०२६</time>
                        <h3>रायगड · पनवेल · २ एकर (८,०९४ चौ.मी.)</h3>
                        <p class="sandhi-page__muted">NAINA क्षेत्रातील निवासी/व्यापारी वापरास योग्य भूखंड; ७/१२ स्वच्छ.</p>
                    </article>
                    <article class="sandhi-page__card sandhi-page__listing">
                        <span class="sandhi-page__tag">पुनर्विकास संधी</span>
                        <time datetime="2026-09-24">२४ सप्टेंबर २०२६</time>
                        <h3>मुंबई उपनगर · बोरिवली · १,१०० चौ.मी.</h3>
                        <p class="sandhi-page__muted">२८ सदनिकांची गृहनिर्माण संस्था; सभासदांचा ठराव मंजूर.</p>
                    </article>
                    <article class="sandhi-page__card sandhi-page__listing">
                        <span class="sandhi-page__tag">विकास भागीदार हवा</span>
                        <time datetime="2026-09-18">१८ सप्टेंबर २०२६</time>
                        <h3>पुणे · हवेली · १.५ एकर</h3>
                        <p class="sandhi-page__muted">रिंग रोडलगत प्लॉटेड/रो-हाऊस प्रकल्पासाठी भागीदार.</p>
                    </article>
                </div>
                <p class="sandhi-page__muted mt-3">वरील संधी नमुना स्वरूपात आहेत.</p>
                <a class="sandhi-page__submit d-inline-block text-decoration-none mt-3" href="#nondava">
                    संधी नोंदवा
                </a>
            </section>

            <section class="sandhi-page__panel" id="sandhi-panel-ad" role="tabpanel"
                aria-labelledby="sandhi-tab-ad" hidden>
                <div class="sandhi-page__grid sandhi-page__grid--three">
                    <article class="sandhi-page__card">
                        <span class="sandhi-page__tag">जाहिरात / प्रायोजित</span>
                        <div class="sandhi-page__project-image">प्रकल्प प्रतिमा</div>
                        <h3>नमुना निवासी प्रकल्प — पनवेल</h3>
                        <p class="sandhi-page__muted">२ व ३ BHK · MahaRERA क्र. P5200000000</p>
                    </article>
                    <article class="sandhi-page__card">
                        <span class="sandhi-page__tag">जाहिरात / प्रायोजित</span>
                        <div class="sandhi-page__project-image">प्रकल्प प्रतिमा</div>
                        <h3>नमुना व्यापारी संकुल — नाशिक</h3>
                        <p class="sandhi-page__muted">दुकाने व कार्यालये · MahaRERA क्र. P5100000000</p>
                    </article>
                    <article class="sandhi-page__card sandhi-page__ad-placeholder">
                        <div>
                            <h3>जाहिरात जागा उपलब्ध</h3>
                            <p class="sandhi-page__muted">शुल्क प्रशासन-निर्धारित / महिना</p>
                        </div>
                    </article>
                </div>
            </section>

            <section class="sandhi-page__form-section" id="nondava">
                <h2 class="sandhi-page__section-title">संधी नोंदवा</h2>
                <p class="sandhi-page__lead">
                    सूची नोंदणी शुल्क प्रशासन-निर्धारित — अनावश्यक व अगंभीर सूची टाळण्यासाठी. प्रक्रिया: सादर → शुल्क →
                    महासंघ तपासणी → मान्यता → प्रसिद्धी. मान्यतेशिवाय काहीही प्रसिद्ध होत नाही.
                </p>

                @if (session('sandhi_success'))
                    <div class="alert alert-success">{{ session('sandhi_success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="sandhi-page__card sandhi-page__form" id="sandhi-form" method="POST"
                    action="{{ route('sandhi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="sandhi-page__form-grid">
                        <div class="sandhi-page__field">
                            <label for="sandhi-name">अर्जदार / कंपनी *</label>
                            <input id="sandhi-name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-mobile">मोबाईल *</label>
                            <input id="sandhi-mobile" name="mobile" value="{{ old('mobile') }}" type="tel" inputmode="numeric"
                                pattern="[0-9]{10}" autocomplete="tel" required>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-email">ई-मेल *</label>
                            <input id="sandhi-email" name="email" value="{{ old('email') }}" type="email" autocomplete="email" required>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-type">प्रस्तावाचा प्रकार *</label>
                            <select id="sandhi-type" name="type" required>
                                <option value="">निवडा</option>
                                @foreach (\App\Models\SandhiListing::TYPES as $type)
                                    <option value="{{ $type }}" @selected(old('type') === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-district">जिल्हा *</label>
                            <select id="sandhi-district" name="district"
                                data-taluka-url="{{ route('talukas.byDistrict', ['district' => '__district__']) }}"
                                required>
                                <option value="">जिल्हा निवडा</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" @selected(old('district') == $district->id)>{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-taluka">तालुका *</label>
                            <select id="sandhi-taluka" name="taluka" data-old="{{ old('taluka') }}" required disabled>
                                <option value="">आधी जिल्हा निवडा</option>
                            </select>
                        </div>
                        <div class="sandhi-page__field sandhi-page__field--full">
                            <label for="sandhi-location">मालमत्तेचे ठिकाण *</label>
                            <input id="sandhi-location" name="location" value="{{ old('location') }}" required>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-area">जमीन क्षेत्र *</label>
                            <input id="sandhi-area" name="area" value="{{ old('area') }}" placeholder="उदा. २ एकर / ८,०९४ चौ.मी." required>
                        </div>
                        <div class="sandhi-page__field">
                            <label for="sandhi-map">नकाशा लिंक <small>(Google Maps)</small></label>
                            <input id="sandhi-map" name="map" type="url" value="{{ old('map') }}">
                        </div>
                        <div class="sandhi-page__field sandhi-page__field--full">
                            <label for="sandhi-brief">थोडक्यात प्रस्ताव *</label>
                            <textarea id="sandhi-brief" name="brief" required>{{ old('brief') }}</textarea>
                        </div>
                        <div class="sandhi-page__field sandhi-page__field--full">
                            <label for="sandhi-terms">अपेक्षित अटी</label>
                            <textarea id="sandhi-terms" name="terms" style="min-height:80px">{{ old('terms') }}</textarea>
                        </div>
                        <div class="sandhi-page__field sandhi-page__field--full">
                            <label for="sandhi-docs">कागदपत्रे / छायाचित्रे <small>(७/१२, नकाशा, फोटो)</small></label>
                            <input id="sandhi-docs" name="documents[]" type="file" multiple accept=".jpg,.jpeg,.png,.webp,.pdf">
                        </div>
                        <div class="sandhi-page__field sandhi-page__field--full">
                            <label class="sandhi-page__check" for="sandhi-agree">
                                <input id="sandhi-agree" name="agree" type="checkbox" value="1" @checked(old('agree')) required>
                                <span>मी सूची नियम व अटी मान्य करतो/करते; दिलेली माहिती खरी आहे.</span>
                            </label>
                        </div>
                        <div class="sandhi-page__field sandhi-page__field--full">
                            <button class="sandhi-page__submit" type="submit">
                                संधी सादर करा
                            </button>
                        </div>
                    </div>
                    <p class="sandhi-page__status" id="sandhi-status" role="status" hidden></p>
                </form>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.sandhi-page__tab').forEach((tab) => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.sandhi-page__tab').forEach((item) => {
                    item.setAttribute('aria-selected', String(item === tab));
                });
                document.querySelectorAll('.sandhi-page__panel').forEach((panel) => {
                    panel.hidden = panel.id !== tab.getAttribute('aria-controls');
                });
            });
        });

        if (window.location.hash === '#sandhi-panel-ad') {
            document.getElementById('sandhi-tab-ad').click();
        }

        const districtSelect = document.getElementById('sandhi-district');
        const talukaSelect = document.getElementById('sandhi-taluka');

        districtSelect.addEventListener('change', async () => {
            const districtId = districtSelect.value;
            talukaSelect.replaceChildren(new Option(
                districtId ? 'तालुका निवडा' : 'आधी जिल्हा निवडा',
                ''
            ));
            talukaSelect.disabled = true;

            if (!districtId) {
                return;
            }

            try {
                const endpoint = districtSelect.dataset.talukaUrl.replace(
                    '__district__',
                    encodeURIComponent(districtId)
                );
                const response = await fetch(endpoint);
                if (!response.ok) {
                    throw new Error(`तालुका यादी लोड झाली नाही (${response.status}).`);
                }

                const talukas = await response.json();
                const oldTaluka = talukaSelect.dataset.old;
                talukas.forEach((name) => talukaSelect.add(new Option(name, name, false, name === oldTaluka)));
                talukaSelect.dataset.old = '';
                talukaSelect.disabled = false;
            } catch (error) {
                talukaSelect.replaceChildren(new Option('तालुका यादी उपलब्ध नाही', ''));
                document.getElementById('sandhi-status').hidden = false;
                document.getElementById('sandhi-status').textContent = error.message;
            }
        });

        // After a failed submit, reload talukas for the previously chosen district
        if (districtSelect.value) {
            districtSelect.dispatchEvent(new Event('change'));
        }

        // Prevent double submit
        document.getElementById('sandhi-form').addEventListener('submit', (event) => {
            const button = event.currentTarget.querySelector('[type="submit"]');
            button.disabled = true;
            button.textContent = 'सादर होत आहे…';
        });
    </script>
@endpush