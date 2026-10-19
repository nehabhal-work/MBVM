<style>
    #karya {
        padding: clamp(52px, 7vw, 82px) 0;
        color: #1d2940;
    }

    #karya .karya-eyebrow {
        display: inline-block;
        margin-bottom: 10px;
        color: #d45d2c;
        font-weight: 700;
    }

    #karya .karya-heading {
        margin-bottom: 12px;
        color: #1d2940;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        font-weight: 700;
    }

    #karya .karya-intro {
        max-width: 760px;
        margin: 0 auto;
        color: #596273;
        font-size: 1.05rem;
        line-height: 1.7;
    }

    #karya .karya-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 24px;
        margin-top: 42px;
    }

    #karya .karya-card {
        overflow: hidden;
        min-width: 0;
        color: inherit;
        background: #fff;
        border: 1px solid #ead8cd;
        border-radius: 14px;
        text-decoration: none;
        transition: transform .2s ease, border-color .2s ease;
    }

    #karya .karya-card:hover {
        transform: translateY(-4px);
        border-color: #d45d2c;
    }

    #karya .karya-card__cover {
        display: grid;
        min-height: 210px;
        padding: 24px;
        place-items: center;
        color: #d45d2c;
        background: linear-gradient(145deg, #fff7f1, #f3d8c8);
        text-align: center;
    }

    #karya .karya-card__cover i {
        display: block;
        margin-bottom: 12px;
        font-size: 1.8rem;
    }

    #karya .karya-card__cover span {
        font-size: 1.1rem;
        font-weight: 600;
    }

    #karya .karya-card__body {
        padding: 22px;
    }

    #karya .karya-card__date {
        margin-bottom: 7px;
        color: #70798a;
        font-size: .9rem;
    }

    #karya .karya-card__title {
        margin: 0 0 12px;
        color: #1d2940;
        font-size: 1.2rem;
        font-weight: 700;
        line-height: 1.45;
    }

    #karya .karya-card__excerpt {
        margin: 0;
        color: #596273;
        line-height: 1.65;
    }

    #karya .karya-more {
        display: inline-flex;
        min-height: 50px;
        align-items: center;
        gap: 9px;
        margin-top: 34px;
        padding: 11px 24px;
        color: #bd4e23;
        border: 2px solid #d45d2c;
        border-radius: 999px;
        font-weight: 700;
        text-decoration: none;
        transition: color .2s ease, background-color .2s ease;
    }

    #karya .karya-more:hover {
        color: #fff;
        background: #d45d2c;
    }

    @media (max-width: 991px) {
        #karya .karya-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }
    }

    @media (max-width: 575px) {
        #karya .karya-grid {
            grid-template-columns: 1fr;
        }

        #karya .karya-card__cover {
            min-height: 170px;
        }
    }
</style>

<section class="logo-bg-dark" id="karya" aria-labelledby="karya-heading">
    <div class="container">
        <header class="text-center">
            <span class="karya-eyebrow">आमचे कार्य</span>
            <h2 class="karya-heading" id="karya-heading">महासंघाचे कार्य / घडामोडी</h2>
            <p class="karya-intro">
                शासनाकडे निवेदने, प्राधिकरणांशी बैठका, धोरणात्मक प्रश्न आणि संलग्न संघटनांचे उपक्रम.
            </p>
        </header>

        <div class="karya-grid">
            @foreach ($karyaUpdates->take(3) as $update)
                <a class="karya-card" href="{{ route('karya.index') }}">
                    <div class="karya-card__cover">
                        <div>
                            <i class="fas {{ match ($update['category']) {
                                'शासनाकडे निवेदने' => 'fa-landmark',
                                'प्राधिकरणांशी बैठका' => 'fa-handshake',
                                'कार्यक्रम' => 'fa-people-group',
                                default => 'fa-newspaper',
                            } }}" aria-hidden="true"></i>
                            <span>{{ $update['category'] }}</span>
                        </div>
                    </div>
                    <div class="karya-card__body">
                        <div class="karya-card__date">{{ $update['date'] }}</div>
                        <h3 class="karya-card__title">{{ $update['title'] }}</h3>
                        <p class="karya-card__excerpt">{{ $update['excerpt'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="text-center">
            <a class="karya-more" href="{{ route('karya.index') }}">
                सर्व घडामोडी पहा
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
