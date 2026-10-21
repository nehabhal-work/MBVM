@extends('layouts.master')

@section('content')
    <style>
        .karya-page {
            padding-bottom: 72px;
            background: #f7f8fa;
        }

        .karya-page__hero {
            padding: clamp(48px, 7vw, 78px) 0;
            color: #fff;
            background: linear-gradient(120deg, #1d2940 0%, #33425d 48%, #d45d2c 100%);
        }

        .karya-page__breadcrumb {
            margin-bottom: 14px;
            color: rgba(255, 255, 255, .82);
        }

        .karya-page__breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .karya-page__title {
            color: #1d2940;
            font-weight: 700;
        }

        .karya-page__hero .karya-page__title {
            margin: 0 0 12px;
            color: #fff;
            font-size: clamp(2rem, 4vw, 3rem);
        }

        .karya-page__intro {
            max-width: 760px;
            color: #626c7c;
            line-height: 1.7;
        }

        .karya-page__hero .karya-page__intro {
            margin: 0;
            color: rgba(255, 255, 255, .9);
            font-size: 1.1rem;
        }

        .karya-page__body {
            padding-top: 44px;
        }

        .karya-page__filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin: 28px 0;
        }

        .karya-page__filter {
            padding: 9px 16px;
            color: #1d2940;
            background: #fff;
            border: 1px solid #dfe3e9;
            border-radius: 999px;
            cursor: pointer;
        }

        .karya-page__filter[aria-pressed="true"] {
            color: #fff;
            background: #d45d2c;
            border-color: #d45d2c;
        }

        .karya-page__grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .karya-page__card {
            padding: 24px;
            background: #fff;
            border: 1px solid #e7eaf0;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(29, 41, 64, .05);
        }

        .karya-page__category {
            color: #d45d2c;
            font-weight: 700;
        }

        .karya-page__date {
            margin: 12px 0 6px;
            color: #70798a;
            font-size: .92rem;
        }

        .karya-page__card h2 {
            color: #1d2940;
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.45;
        }

        .karya-page__card p {
            color: #596273;
            line-height: 1.65;
        }

        .karya-page__status {
            display: inline-block;
            padding: 5px 10px;
            color: #725214;
            background: #fff4d8;
            border-radius: 999px;
            font-size: .86rem;
            font-weight: 600;
        }

        .karya-page__status--submitted {
            color: #176344;
            background: #e8f6ef;
        }

        .karya-page__table-wrap {
            overflow-x: auto;
            margin-top: 52px;
            background: #fff;
            border: 1px solid #e7eaf0;
            border-radius: 14px;
        }

        .karya-page__table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .karya-page__table th,
        .karya-page__table td {
            padding: 14px 16px;
            border-bottom: 1px solid #e7eaf0;
            text-align: left;
            vertical-align: top;
        }

        .karya-page__table th {
            color: #1d2940;
            background: #f7f8fa;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .karya-page__grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .karya-page__grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <main class="karya-page">
        <header class="karya-page__hero">
            <div class="container">
                <div class="karya-page__breadcrumb">
                    <a href="{{ route('home') }}">मुख्यपृष्ठ</a>
                    <span aria-hidden="true"> / </span>
                    <span aria-current="page">महासंघाचे कार्य / घडामोडी</span>
                </div>
                <h1 class="karya-page__title">महासंघाचे कार्य / घडामोडी</h1>
                <p class="karya-page__intro mx-auto">
                    शासनाकडे निवेदने, बैठका, धोरणात्मक प्रश्न, यश व संलग्न संघटनांचे उपक्रम.
                </p>
            </div>
        </header>

        <div class="container karya-page__body">
            <nav class="karya-page__filters" aria-label="घडामोडींचे प्रकार">
                <button class="karya-page__filter" type="button" data-karya-filter="all" aria-pressed="true">
                    सर्व
                </button>
                @foreach ($karyaUpdates->pluck('category')->unique() as $category)
                    <button class="karya-page__filter" type="button" data-karya-filter="{{ $category }}"
                        aria-pressed="false">
                        {{ $category }}
                    </button>
                @endforeach
            </nav>

            <div class="karya-page__grid" id="karya-page-list">
                @foreach ($karyaUpdates as $update)
                    <article class="karya-page__card" data-karya-category="{{ $update['category'] }}">
                        <span class="karya-page__category">{{ $update['category'] }}</span>
                        <div class="karya-page__date">{{ $update['date'] }}</div>
                        <h2>{{ $update['title'] }}</h2>
                        <p>{{ $update['excerpt'] }}</p>
                        @if ($update['outcome'])
                            <span class="karya-page__status {{ $update['outcome'] === 'सादर' ? 'karya-page__status--submitted' : '' }}">
                                {{ $update['outcome'] }}
                            </span>
                        @endif
                    </article>
                @endforeach
            </div>

            <h2 class="karya-page__title h3 mt-5">शासनाकडे निवेदने — स्थिती</h2>
            <p class="text-muted">निवेदनाचा विषय, संबंधित प्राधिकरण आणि सद्यस्थिती.</p>
            <div class="karya-page__table-wrap">
                <table class="karya-page__table">
                    <thead>
                        <tr>
                            <th scope="col">दिनांक</th>
                            <th scope="col">विषय</th>
                            <th scope="col">प्राधिकरण</th>
                            <th scope="col">स्थिती</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyaUpdates->where('authority', '!=', '') as $update)
                            <tr>
                                <td>{{ $update['date'] }}</td>
                                <td>{{ $update['title'] }}</td>
                                <td>{{ $update['authority'] }}</td>
                                <td><span class="karya-page__status {{ $update['outcome'] === 'सादर' ? 'karya-page__status--submitted' : '' }}">
                                    {{ $update['outcome'] }}
                                </span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">सध्या निवेदनांची माहिती उपलब्ध नाही.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('[data-karya-filter]').forEach((button) => {
            button.addEventListener('click', () => {
                const category = button.dataset.karyaFilter;
                document.querySelectorAll('[data-karya-filter]').forEach((filter) => {
                    filter.setAttribute('aria-pressed', String(filter === button));
                });
                document.querySelectorAll('[data-karya-category]').forEach((card) => {
                    card.hidden = category !== 'all' && card.dataset.karyaCategory !== category;
                });
            });
        });
    </script>
@endpush
