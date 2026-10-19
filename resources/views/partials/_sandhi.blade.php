<style>
    #sandhi {
        padding: clamp(48px, 6vw, 72px) 0;
        color: #1d2940;
        background: #fff;
    }

    #sandhi .sandhi__eyebrow {
        display: inline-block;
        margin-bottom: 8px;
        color: #d45d2c;
        font-weight: 700;
    }

    #sandhi .sandhi__heading {
        margin: 0 0 24px;
        color: #1d2940;
        font-size: clamp(1.8rem, 3.4vw, 2.6rem);
        font-weight: 700;
        line-height: 1.3;
    }

    #sandhi .sandhi__layout {
        display: grid;
        grid-template-columns: minmax(0, .82fr) minmax(0, 1.18fr);
        gap: 28px;
        align-items: stretch;
    }

    #sandhi .sandhi__ad-card,
    #sandhi .sandhi__listing {
        overflow: hidden;
        border: 1px solid #ead8cd;
        border-radius: 13px;
        background: #fff;
    }

    #sandhi .sandhi__ad-card {
        padding: 24px;
    }

    #sandhi .sandhi__ad-visual {
        display: grid;
        min-height: 340px;
        place-items: center;
        color: #697386;
        background: linear-gradient(145deg, #fff7f1, #f2d9ca);
        border-radius: 10px;
        text-align: center;
    }

    #sandhi .sandhi__ad-visual i {
        display: none;
    }

    #sandhi .sandhi__ad-label,
    #sandhi .sandhi__listing-type {
        display: inline-flex;
        align-items: center;
        width: fit-content;
        padding: 5px 11px;
        color: #d45d2c;
        border: 1px solid #d45d2c;
        border-radius: 999px;
        font-size: .88rem;
        font-weight: 600;
        line-height: 1.3;
    }

    #sandhi .sandhi__ad-label {
        float: right;
        margin: -12px -12px 0 0;
    }

    #sandhi .sandhi__ad-title {
        margin: 16px 0 4px;
        color: #1d2940;
        font-size: 1.15rem;
        font-weight: 700;
    }

    #sandhi .sandhi__ad-meta,
    #sandhi .sandhi__disclaimer,
    #sandhi .sandhi__listing-description {
        color: #697386;
        line-height: 1.65;
    }

    #sandhi .sandhi__ad-meta {
        margin: 0;
        font-size: .95rem;
    }

    #sandhi .sandhi__disclaimer {
        margin: 12px 0 0;
        font-size: .9rem;
    }

    #sandhi .sandhi__list {
        display: grid;
        gap: 22px;
    }

    #sandhi .sandhi__listing {
        padding: 20px 24px;
    }

    #sandhi .sandhi__listing-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 8px;
    }

    #sandhi .sandhi__listing-date {
        color: #697386;
        font-size: .9rem;
    }

    #sandhi .sandhi__listing-title {
        margin: 0 0 7px;
        color: #1d2940;
        font-size: 1.1rem;
        font-weight: 700;
    }

    #sandhi .sandhi__listing-description {
        margin: 0;
        font-size: .96rem;
    }

    #sandhi .sandhi__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 18px;
    }

    #sandhi .sandhi__actions .btn {
        min-height: 48px;
        padding: 10px 22px;
        border-radius: 999px;
        font-weight: 700;
    }

    #sandhi .sandhi__actions .btn-outline-brand {
        color: #d45d2c;
        background: transparent;
        border: 2px solid #d45d2c;
    }

    #sandhi .sandhi__actions .btn-outline-brand:hover {
        color: #fff;
        background: #d45d2c;
    }

    #sandhi .sandhi__actions .btn-brand {
        color: #fff;
        background: #d45d2c;
        border: 2px solid #d45d2c;
    }

    #sandhi .sandhi__actions .btn-brand:hover {
        background: #bd4e23;
        border-color: #bd4e23;
    }

    @media (max-width: 767px) {
        #sandhi .sandhi__layout {
            grid-template-columns: 1fr;
            gap: 22px;
        }

        #sandhi .sandhi__ad-visual {
            min-height: 240px;
        }

        #sandhi .sandhi__list {
            gap: 14px;
        }

        #sandhi .sandhi__listing {
            padding: 18px;
        }
    }

    @media (max-width: 420px) {
        #sandhi .sandhi__actions {
            flex-direction: column;
        }

        #sandhi .sandhi__actions .btn {
            width: 100%;
        }
    }
</style>

<section id="sandhi" aria-labelledby="sandhi-heading">
    <div class="container">
        <header class="text-center mb-4">
            <span class="sandhi__eyebrow">जाहिरात / व्यावसायिक संधी</span>
            <h2 class="sandhi__heading" id="sandhi-heading">
                संयुक्त विकास (JV / JD) संधी व प्रकल्प जाहिराती
            </h2>
        </header>

        <div class="sandhi__layout">
            <div>
                <article class="sandhi__ad-card">
                    <span class="sandhi__ad-label">जाहिरात / प्रायोजित</span>
                    <div class="sandhi__ad-visual">
                        <div>
                            <i class="fas fa-city" aria-hidden="true"></i>
                            <span>प्रकल्प प्रतिमा</span>
                        </div>
                    </div>
                    <h3 class="sandhi__ad-title">नमुना निवासी प्रकल्प — पनवेल</h3>
                    <p class="sandhi__ad-meta">२ व ३ BHK · MahaRERA क्र. P5200000000</p>
                </article>
                <p class="sandhi__disclaimer">
                    जाहिरात जागा — महासंघाच्या मान्यतेनंतरच प्रसिद्ध.
                </p>
            </div>

            <div id="sandhi-opportunities">
                <div class="sandhi__list">
                    <article class="sandhi__listing">
                        <div class="sandhi__listing-header">
                            <span class="sandhi__listing-type">जमीन JV/JD साठी उपलब्ध</span>
                            <time class="sandhi__listing-date" datetime="2026-10-01">०१ ऑक्टोबर २०२६</time>
                        </div>
                        <h3 class="sandhi__listing-title">रायगड · पनवेल · २ एकर (८,०९४ चौ.मी.)</h3>
                        <p class="sandhi__listing-description">NAINA क्षेत्रातील निवासी/व्यापारी वापरास योग्य भूखंड; ७/१२ स्वच्छ.</p>
                    </article>

                    <article class="sandhi__listing">
                        <div class="sandhi__listing-header">
                            <span class="sandhi__listing-type">पुनर्विकास संधी</span>
                            <time class="sandhi__listing-date" datetime="2026-09-24">२४ सप्टेंबर २०२६</time>
                        </div>
                        <h3 class="sandhi__listing-title">मुंबई उपनगर · बोरिवली · १,१०० चौ.मी.</h3>
                        <p class="sandhi__listing-description">२८ सदनिकांची गृहनिर्माण संस्था; सभासदांचा ठराव मंजूर.</p>
                    </article>

                    <article class="sandhi__listing">
                        <div class="sandhi__listing-header">
                            <span class="sandhi__listing-type">विकास भागीदार हवा</span>
                            <time class="sandhi__listing-date" datetime="2026-09-18">१८ सप्टेंबर २०२६</time>
                        </div>
                        <h3 class="sandhi__listing-title">पुणे · हवेली · १.५ एकर</h3>
                        <p class="sandhi__listing-description">रिंग रोडलगत प्लॉटेड/रो-हाऊस प्रकल्पासाठी भागीदार.</p>
                    </article>
                </div>

                <div class="sandhi__actions">
                    <a class="btn btn-outline-brand" href="#sandhi-opportunities">सर्व संधी पहा</a>
                    <a class="btn btn-brand" href="{{ url('/sandhi.html#nondava') }}">संधी नोंदवा</a>
                </div>
            </div>
        </div>
    </div>
</section>
