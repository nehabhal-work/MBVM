<section class="mbvm-contact logo-bg-dark" id="sampark">
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

            <form class="mbvm-contact__enquiry" id="enquiry-form" method="POST" action="{{ route('enquiries.store') }}">
                @csrf
                <h3>सामान्य चौकशी / संदेश</h3>
                <p class="mbvm-contact__notice">सदस्य नोंदणीसाठी हा फॉर्म नाही —
                    <a href="{{ route('register.show') }}">नोंदणी करा</a>
                </p>

                <div class="mbvm-contact__form-grid">
                    <div class="mbvm-contact__field">
                        <label for="enquiry-name">नाव *</label>
                        <input id="enquiry-name" name="name" autocomplete="name" required maxlength="255"
                            value="{{ old('name') }}">
                    </div>
                    <div class="mbvm-contact__field">
                        <label for="enquiry-mobile">मोबाईल *</label>
                        <input id="enquiry-mobile" name="mobile" type="tel" inputmode="numeric" pattern="[0-9]{10}"
                            maxlength="10" title="१० अंकी मोबाईल क्रमांक" autocomplete="tel" required
                            value="{{ old('mobile') }}">
                    </div>
                    <div class="mbvm-contact__field">
                        <label for="enquiry-email">ई-मेल</label>
                        <input id="enquiry-email" name="email" type="email" autocomplete="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="mbvm-contact__field">
                        <label for="enquiry-organization">कंपनी / संस्था</label>
                        <input id="enquiry-organization" name="organization" autocomplete="organization"
                            value="{{ old('organization') }}">
                    </div>
                    <div class="mbvm-contact__field mbvm-contact__field--full">
                        <label for="enquiry-subject">विषय</label>
                        <input id="enquiry-subject" name="subject" maxlength="255" value="{{ old('subject') }}">
                    </div>
                    <div class="mbvm-contact__field mbvm-contact__field--full">
                        <label for="enquiry-message">संदेश *</label>
                        <textarea id="enquiry-message" name="message" rows="4" required maxlength="3000">{{ old('message') }}</textarea>
                    </div>
                </div>
                <button class="mbvm-contact__submit" type="submit">संदेश पाठवा</button>
                <p class="mbvm-contact__status" id="enquiry-status" role="status" aria-live="polite"
                    style="{{ $errors->any() ? 'color:#b42318' : '' }}">
                    @if ($errors->any())
                        {{ $errors->first() }}
                    @endif
                </p>
            </form>
        </div>
        <p class="mbvm-contact__status" id="contact-copy-status" aria-live="polite"></p>
    </div>
</section>

{{-- Success popup after the enquiry is saved --}}
<div class="modal fade" id="enquiry-success-modal" tabindex="-1" aria-labelledby="enquiry-success-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center" style="border-radius:16px;border:0">
            <div class="modal-body p-4">
                <i class="fas fa-check-circle mb-3" style="font-size:3rem;color:#1a7f4b" aria-hidden="true"></i>
                <h5 class="mb-2" id="enquiry-success-title" style="color:#1d2940;font-weight:700">धन्यवाद!</h5>
                <p class="mb-4" id="enquiry-success-text">आपला संदेश मिळाला. आम्ही लवकरच आपल्याशी संपर्क साधू.</p>
                <button type="button" class="btn btn-primary rounded-pill px-5" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

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

        // Send the enquiry without reloading the page; it is saved and listed in ERP → संपर्क चौकशी
        (() => {
            const form = document.getElementById('enquiry-form');
            if (!form || !window.fetch) return;

            const status = document.getElementById('enquiry-status');
            const button = form.querySelector('button[type="submit"]');

            const show = (text, isError) => {
                status.textContent = text;
                status.style.color = isError ? '#b42318' : '';
            };

            // Popup with the success message; closes on OK
            const showSuccess = (text) => {
                const modalEl = document.getElementById('enquiry-success-modal');
                if (text) document.getElementById('enquiry-success-text').textContent = text;

                try {
                    // Bootstrap 5.0.0 has no getOrCreateInstance — reuse or create the instance ourselves
                    const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modal.show();
                } catch {
                    alert(text || 'आपला संदेश मिळाला. आम्ही लवकरच आपल्याशी संपर्क साधू.');
                }
            };

            // Without JS fetch the page reloads with a flash message — show the same popup then
            @if (session('enquiry_success'))
                document.addEventListener('DOMContentLoaded', () => showSuccess(@json(session('enquiry_success'))));
            @endif

            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                button.disabled = true;
                show('पाठवत आहे…', false);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                        body: new FormData(form),
                    });
                    const data = await response.json().catch(() => ({}));

                    if (response.ok) {
                        form.reset();
                        show('', false);
                        // Saved — show the popup outside the try so a popup problem is never reported as "not sent"
                        setTimeout(() => showSuccess(data.message), 0);
                    } else if (response.status === 422 && data.errors) {
                        show(Object.values(data.errors)[0][0], true);
                    } else if (response.status === 429) {
                        show('खूप वेळा प्रयत्न झाले. कृपया थोड्या वेळाने पुन्हा प्रयत्न करा.', true);
                    } else if (response.status === 419) {
                        show('पानाची वेळ संपली. कृपया पान रिफ्रेश करून पुन्हा पाठवा.', true);
                    } else {
                        show('संदेश पाठवता आला नाही. कृपया पुन्हा प्रयत्न करा.', true);
                    }
                } catch {
                    show('संदेश पाठवता आला नाही. कृपया इंटरनेट तपासून पुन्हा प्रयत्न करा.', true);
                } finally {
                    button.disabled = false;
                }
            });
        })();
    </script>
@endpush
