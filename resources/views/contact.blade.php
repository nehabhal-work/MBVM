<section class="mbvm-contact" id="sampark">
    <span class="mbvm-contact__anchor" id="contact"></span>
    <div class="mbvm-contact__container">
        <div class="mbvm-contact__heading">
            <span class="mbvm-contact__eyebrow">संपर्क</span>
            <h2>आमची कार्यालये व सामान्य चौकशी</h2>
        </div>

        <div class="mbvm-contact__layout">
            <div class="mbvm-contact__offices" aria-label="कार्यालयांची माहिती">
                <article class="mbvm-contact__office">
                    <header>
                        <h3>नोंदणीकृत कार्यालय</h3>
                        <span>वाशी, नवी मुंबई</span>
                    </header>
                    <div class="mbvm-contact__office-body">
                        <p>१७०२, हावरे इन्फोटेक पार्क, फोर पॉईंट हॉटेलसमोर, सेक्टर ३०ए, वाशी, नवी मुंबई – ४०० ७०५</p>
                        <a href="https://www.google.com/maps/search/Haware+Infotech+Park+Vashi" target="_blank"
                            rel="noopener noreferrer">नकाशावर पहा ↗</a>
                    </div>
                </article>

                <article class="mbvm-contact__office">
                    <header>
                        <h3>कार्यालय</h3>
                        <span>पुणे</span>
                    </header>
                    <div class="mbvm-contact__office-body">
                        <p>ऑफिस क्र. २०१, २रा मजला, प्रो-वन बिझनेस सेंटर, रत्ना हॉस्पिटलसमोर, सेनापती बापट रोड, पुणे –
                            ४११ ०१६</p>
                        <a href="https://www.google.com/maps/search/Senapati+Bapat+Road+Pune" target="_blank"
                            rel="noopener noreferrer">नकाशावर पहा ↗</a>
                    </div>
                </article>

                <div class="mbvm-contact__details">
                    <p>
                        <strong>फोन</strong>
                        <span class="mbvm-contact__copy">[कार्यालय क्रमांक]
                            <button type="button" data-copy="[कार्यालय क्रमांक]">कॉपी</button>
                        </span>
                    </p>
                    <p>
                        <strong>ई-मेल</strong>
                        <span class="mbvm-contact__copy">[ई-मेल @mbvm.in]
                            <button type="button" data-copy="[ई-मेल]">कॉपी</button>
                        </span>
                    </p>
                    <p class="mbvm-contact__note">प्रत्यक्ष क्रमांक व ई-मेल प्रशासनाकडून भरले जातील.</p>
                </div>
            </div>

            <div class="mbvm-contact__enquiry">
                <h3>सामान्य चौकशी / संदेश</h3>
                <p class="mbvm-contact__notice">सदस्य नोंदणीसाठी हा फॉर्म नाही —
                    <a href="{{ route('register.show') }}">नोंदणी करा</a>
                </p>

                <div class="mbvm-contact__form-grid">
                    <div class="mbvm-contact__field">
                        <label for="enquiry-name">नाव</label>
                        <input id="enquiry-name" name="name" autocomplete="name">
                    </div>
                    <div class="mbvm-contact__field">
                        <label for="enquiry-mobile">मोबाईल</label>
                        <input id="enquiry-mobile" name="mobile" type="tel" inputmode="numeric"
                            pattern="[0-9]{10}" autocomplete="tel">
                    </div>
                    <div class="mbvm-contact__field">
                        <label for="enquiry-email">ई-मेल</label>
                        <input id="enquiry-email" name="email" type="email" autocomplete="email">
                    </div>
                    <div class="mbvm-contact__field">
                        <label for="enquiry-organization">कंपनी / संस्था</label>
                        <input id="enquiry-organization" name="organization" autocomplete="organization">
                    </div>
                    <div class="mbvm-contact__field mbvm-contact__field--full">
                        <label for="enquiry-subject">विषय</label>
                        <input id="enquiry-subject" name="subject">
                    </div>
                    <div class="mbvm-contact__field mbvm-contact__field--full">
                        <label for="enquiry-message">संदेश</label>
                        <textarea id="enquiry-message" name="message" rows="4"></textarea>
                    </div>
                </div>
                <button class="mbvm-contact__submit" type="button">संदेश पाठवा</button>
            </div>
        </div>
        <p class="mbvm-contact__status" id="contact-copy-status" aria-live="polite"></p>
    </div>
</section>

@push('scripts')
    <script>
        document.querySelectorAll('.mbvm-contact [data-copy]').forEach((button) => {
            button.addEventListener('click', async () => {
                const status = document.getElementById('contact-copy-status');

                try {
                    await navigator.clipboard.writeText(button.dataset.copy);
                    status.textContent = 'मजकूर कॉपी केला.';
                } catch {
                    status.textContent = 'मजकूर कॉपी करता आला नाही.';
                }
            });
        });
    </script>
@endpush
