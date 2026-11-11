@extends('frontend.master')

@section('title')
Terms Of Service
@endsection()

@section('content')
<div class="hero-section inner-hero legal-policy-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/hero-product.jpg') }}" class="img-fluid"/>
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <h1 class="wow fadeInLeft text-start">Terms of Service</h1>
        </div>
    </div>
</div>

@include('frontend.layout.policy-content', [
    'policyTitle' => 'Terms of Service',
    'policySections' => [
        [
            'heading' => 'Introduction',
            'paragraphs' => [
                'Welcome to www.tapariatools.com, the website of Taparia Tools Limited (Taparia Tools, we, our or us). By accessing or using this website, you agree to these terms. If you do not agree, please discontinue use of the website.',
            ],
        ],
        [
            'heading' => 'Permitted Use',
            'paragraphs' => [
                'You may use this website for lawful informational and business purposes. You must not attempt to disrupt the website, bypass security measures, introduce malicious code, or use the website in violation of applicable law.',
            ],
        ],
        [
            'heading' => 'Product and Website Information',
            'paragraphs' => [
                'We aim to keep product descriptions, images, specifications, and other website information accurate and current. Product designs, specifications, packaging, availability, and other details may change. Website information is general information and should be confirmed with Taparia Tools before being relied on for a purchase or technical application.',
            ],
        ],
        [
            'heading' => 'Enquiries and Orders',
            'paragraphs' => [
                'Submitting an enquiry through the website does not itself create a confirmed order or contract. Pricing, availability, delivery, warranties, and other commercial terms are subject to separate confirmation and applicable transaction documents.',
            ],
        ],
        [
            'heading' => 'Intellectual Property',
            'paragraphs' => [
                'Website text, graphics, photographs, logos, trademarks, designs, and other content are owned by Taparia Tools or their respective rights holders. You may not reproduce, modify, distribute, or commercially use this content without prior permission, except where permitted by law.',
            ],
        ],
        [
            'heading' => 'External Links',
            'paragraphs' => [
                'Links to third-party websites are provided for convenience. Taparia Tools does not control and is not responsible for third-party content, availability, or privacy practices.',
            ],
        ],
        [
            'heading' => 'Disclaimer and Liability',
            'paragraphs' => [
                'To the extent permitted by law, the website is provided on an as available basis. Taparia Tools does not guarantee uninterrupted or error-free access. Nothing in these terms excludes liability that cannot lawfully be excluded.',
            ],
        ],
        [
            'heading' => 'Changes',
            'paragraphs' => [
                'We may update these terms from time to time. The updated version will be published on this website with a revised date where appropriate.',
            ],
        ],
        [
            'heading' => 'Contact',
            'paragraphs' => [
                'For questions about these terms, please use the contact details published on the official website.',
            ],
            'link' => 'https://www.tapariatools.com/',
            'linkText' => 'Taparia Tools official website',
        ],
    ],
])
@endsection()

@section('javaScript')

@endsection()
