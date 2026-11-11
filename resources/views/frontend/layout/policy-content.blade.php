<style>
    .hero-section.legal-policy-hero .hero-text {
        margin-left: 0;
    }

    @media (max-width: 767.98px) {
        .hero-section.legal-policy-hero {
            height: clamp(210px, 38vh, 300px) !important;
            min-height: 210px !important;
            max-height: 300px !important;
        }
    }

    .policy-content {
        padding: 36px 16px 64px;
        background: #f7fafb;
    }

    .policy-content nav.policy-breadcrumb {
        box-sizing: border-box;
        width: 100%;
        margin: 0 auto 16px;
        padding: 7px 10px;
        border: 1px solid #e1eaec;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 3px 10px rgba(34, 75, 86, .05);
    }

    .policy-content nav.policy-breadcrumb .breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .policy-content nav.policy-breadcrumb .breadcrumb-item {
        display: inline-flex;
        align-items: center;
        color: #536b71;
        font-size: .86rem;
        line-height: 1.3;
    }

    .policy-content nav.policy-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        float: none;
        padding: 0 4px 0 0;
        color: #91a7ac;
        content: "›";
    }

    .policy-content nav.policy-breadcrumb .breadcrumb-item a,
    .policy-content nav.policy-breadcrumb .breadcrumb-item span {
        display: inline-flex;
        min-height: 32px;
        align-items: center;
        padding: 6px 10px;
        border: 1px solid #e5edef;
        border-radius: 9px;
        background: #f8fbfc;
        color: #536b71;
        font-size: inherit;
        font-weight: 600;
        text-decoration: none;
    }

    .policy-content nav.policy-breadcrumb .breadcrumb-item.active span {
        border-color: #74bcc6;
        background: #74bcc6;
        color: #fff;
    }

    .policy-document {
        max-width: 980px;
        margin: 0 auto;
        padding: clamp(22px, 5vw, 48px);
        border: 1px solid #e1eaec;
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 12px 34px rgba(34, 75, 86, .07);
        color: #42565b;
        line-height: 1.75;
    }

    .policy-document-header {
        margin-bottom: 30px;
        padding-bottom: 22px;
        border-bottom: 1px solid #e7eef0;
    }

    .policy-document-eyebrow {
        margin: 0 0 6px;
        color: #5a9ea8;
        font-size: .76rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .policy-document-header h2 {
        margin: 0;
        color: #263e44;
        font-size: clamp(1.6rem, 4vw, 2.2rem);
        font-weight: 700;
        line-height: 1.25;
    }

    .policy-section + .policy-section {
        margin-top: 25px;
    }

    .policy-section h3 {
        margin: 0 0 8px;
        color: #2d737d;
        font-size: 1.12rem;
        font-weight: 700;
        line-height: 1.4;
    }

    .policy-section p {
        margin: 0 0 10px;
        font-size: .98rem;
    }

    .policy-section p:last-child {
        margin-bottom: 0;
    }

    .policy-section ul {
        margin: 10px 0 0;
        padding: 0;
        list-style: none;
    }

    .policy-section li {
        position: relative;
        margin-top: 9px;
        padding: 12px 14px 12px 38px;
        border: 1px solid #e6eef0;
        border-radius: 12px;
        background: #f8fbfc;
        font-size: .95rem;
    }

    .policy-section li::before {
        content: "";
        position: absolute;
        top: 19px;
        left: 16px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #74bcc6;
    }

    .policy-section li strong {
        color: #314d53;
    }

    .policy-section a {
        color: #287d89;
        font-weight: 600;
        text-decoration: underline;
        text-underline-offset: 3px;
        overflow-wrap: anywhere;
    }

    @media (max-width: 575.98px) {
        .policy-content {
            padding: 22px 14px 42px;
        }

        .policy-document {
            border-radius: 16px;
            line-height: 1.65;
        }

        .policy-document-header {
            margin-bottom: 24px;
            padding-bottom: 18px;
        }

        .policy-content nav.policy-breadcrumb {
            margin-bottom: 12px;
            padding: 5px 7px;
        }

        .policy-section + .policy-section {
            margin-top: 21px;
        }

        .policy-section p,
        .policy-section li {
            font-size: .93rem;
        }
    }
</style>

<section class="policy-content">
    <div class="container-xl">
        <nav class="policy-breadcrumb" aria-label="Breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>{{ $policyTitle }}</span></li>
            </ol>
        </nav>

        <article class="policy-document">
            <header class="policy-document-header">
                <p class="policy-document-eyebrow">Taparia Tools Limited</p>
                <h2>{{ $policyTitle }}</h2>
            </header>

            @foreach ($policySections as $section)
                <section class="policy-section">
                    <h3>{{ $section['heading'] }}</h3>

                    @foreach (($section['paragraphs'] ?? []) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach

                    @if (!empty($section['items']))
                        <ul>
                            @foreach ($section['items'] as $item)
                                <li>
                                    @if (!empty($item['label']))
                                        <strong>{{ $item['label'] }}:</strong>
                                    @endif
                                    {{ $item['text'] }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!empty($section['link']))
                        <p><a href="{{ $section['link'] }}" target="_blank" rel="noopener noreferrer">{{ $section['linkText'] ?? $section['link'] }}</a></p>
                    @endif
                </section>
            @endforeach
        </article>
    </div>
</section>
