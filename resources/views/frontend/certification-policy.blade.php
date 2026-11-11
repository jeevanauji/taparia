@extends('frontend.master')

@section('title')
Certification Policy
@endsection()

@section('content')
<div class="hero-section inner-hero legal-policy-hero">
    <div class="innerbanner">
        <img src="{{ asset('frontend/images/hero-product.jpg') }}" class="img-fluid"/>
    </div>
    <div class="bannertxt">
        <div class="hero-text">
            <h1 class="wow fadeInLeft text-start">Certification Policy</h1>
        </div>
    </div>
</div>

@include('frontend.layout.policy-content', [
    'policyTitle' => 'Certification Policy',
    'policySections' => [
        [
            'heading' => 'Introduction',
            'paragraphs' => [
                'Taparia Tools Limited is committed to product quality and manufacturing processes appropriate to its products and operations. Information on standards, testing, and certifications should be interpreted according to the scope of the relevant, current documentation.',
            ],
        ],
        [
            'heading' => 'Quality and Standards',
            'paragraphs' => [
                'References to quality systems, standards, approvals, or certifications should be made only where supported by current official records. A company-level management-system certificate does not automatically mean every product is separately certified.',
            ],
        ],
        [
            'heading' => 'Product-Specific Claims',
            'paragraphs' => [
                'Any claim that a product conforms to a particular Indian or international standard should identify the relevant product or product range and should be supported by valid technical documentation or certification, where applicable.',
            ],
        ],
        [
            'heading' => 'Testing and Documentation',
            'paragraphs' => [
                'Testing methods and inspection activities may vary by product and applicable specification. Customers, distributors, and business partners may contact Taparia Tools to enquire about available product specifications, test information, or certification documents.',
            ],
        ],
        [
            'heading' => 'Use of Certification Marks',
            'paragraphs' => [
                'Certification marks, logos, and certificate images must not be reproduced or used in a misleading manner. Their use must follow the relevant certifying body\'s rules and applicable law.',
            ],
        ],
        [
            'heading' => 'Accuracy and Updates',
            'paragraphs' => [
                'Certification scope, validity, and applicable standards may change. Visitors should verify current details with Taparia Tools and the relevant issuing or accrediting body where appropriate.',
            ],
        ],
        [
            'heading' => 'Contact',
            'paragraphs' => [
                'For certification or technical documentation enquiries, visit the official website and use the company\'s published contact details.',
            ],
            'link' => 'https://www.tapariatools.com/',
            'linkText' => 'Taparia Tools official website',
        ],
    ],
])
@endsection()

@section('javaScript')

@endsection()
