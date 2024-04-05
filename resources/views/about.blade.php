@extends('layouts.app')
@section('title', $content['page-title'])
@section('content-description', $content['page-description'])
@section('content-keyword', $content['page-keywords'])
@section('dark', 'light')
@section('css', '')
@section('js')
    <script>
        (function() {
            new HSHeader('#header').init()
            new HSShowAnimation('.js-animation-link')
            HSBsValidation.init('.js-validate', {
                onSubmit: data => {
                    data.event.preventDefault()
                    alert('Submited')
                }
            })
            HSBsDropdown.init()
            new HSGoTo('.js-go-to')
            AOS.init({
                duration: 650,
                once: true
            });
            new HSToggleSwitch('.js-toggle-switch')
        })()
    </script>
@endsection
@section('main')
    <main id="content" role="main">
        <!-- Gallery -->
        <div class="container content-space-t-3 content-space-t-lg-5">
            <div class="w-lg-75 text-center mx-lg-auto">
                <div class="mb-5 mb-md-10">
                    <h1 class="display-4">{{ ucfirst($content['gallery']['title']) }}</h1>
                    <p class="lead">{{ ucfirst($content['gallery']['desc']) }}</p>
                </div>
            </div>

            <div class="row gx-3">
                @foreach ($content['gallery']['row-image'] ?? [] as $k)
                    <div class="col mb-3">
                        <div class="bg-img-start"
                            style="background-image: url({{ $k }}); height: 15rem;"></div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Gallery -->

        <!-- Feature Stats -->
        <div class="container content-space-2 content-space-lg-3">
            <div class="row justify-content-lg-center">
                @foreach ($content['features'] ?? [] as $k)
                    <div class="col-sm-4 col-lg-3 mb-7 mb-sm-0">
                        <div class="text-center">
                            <h2 class="display-4">{{ $k['value'] }}</h2>
                            <p class="small">{{ ucfirst($k['title']) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Feature Stats -->

        <div class="border-top mx-auto" style="max-width: 25rem;"></div>
        <!-- Info -->
        <div class="container content-space-2 content-space-lg-3">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2>Tools should adapt to the user, not the other way around.</h2>
                </div>
                <div class="col-lg-6">
                    <div class="lead">
                        <p style="text-align:justify;">At PT. Sinergi Abadi Sejahtera, we're passionate about packaging
                            solutions that elevate brands, protect products, and delight customers. With years of industry
                            expertise and a commitment to innovation, we specialize in crafting high-quality packaging
                            solutions tailored to meet the unique needs of our clients across various industries.</p>
                        <p style="text-align:justify;">Our Mission:<br>To redefine packaging excellence by delivering
                            innovative, sustainable, and custom-tailored solutions that inspire confidence, drive growth,
                            and leave a lasting impression.</p>
                        <p style="text-align:justify;">What Sets Us Apart:</p>
                        <ul>
                            <li>
                                <p style="text-align:justify;"><strong>Customization</strong></p>
                                <p style="text-align:justify;">We understand that every product and brand is unique. That's
                                    why we offer customizable packaging solutions that reflect the personality and values of
                                    our clients' brands while ensuring optimal functionality and aesthetic appeal.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Quality Assurance</strong></p>
                                <p style="text-align:justify;">We uphold the highest standards of quality in every aspect of
                                    our operations. From materials sourcing to manufacturing processes, we prioritize
                                    quality control measures to deliver packaging solutions that meet or exceed industry
                                    standards.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Innovation</strong></p>
                                <p style="text-align:justify;">We stay at the forefront of industry trends and technologies
                                    to bring innovative packaging solutions to market. Whether it's eco-friendly materials,
                                    smart packaging designs, or cutting-edge printing techniques, we're committed to pushing
                                    the boundaries of possibility.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Sustainability</strong></p>
                                <p style="text-align:justify;">We recognize the importance of environmental responsibility.
                                    That's why we offer a range of sustainable packaging options, including recyclable
                                    materials, biodegradable alternatives, and reduced-waste designs, to help minimize our
                                    environmental footprint.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Customer-Centric Approach</strong></p>
                                <p style="text-align:justify;">Our clients are at the heart of everything we do. We take the
                                    time to understand their unique requirements and challenges, providing personalized
                                    service and support every step of the way to ensure their satisfaction.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Primary Packaging</strong></p>
                                <p style="text-align:justify;">From bottles and jars to pouches and tubes, we offer a wide
                                    range of primary packaging solutions designed to showcase products while providing
                                    protection and convenience.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Secondary Packaging</strong></p>
                                <p style="text-align:justify;">Our secondary packaging solutions, including boxes, cartons,
                                    and labels, are designed to enhance brand visibility, communicate product information,
                                    and streamline logistics.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Specialty Packaging</strong></p>
                                <p style="text-align:justify;">For unique or specialized products, we offer custom packaging
                                    solutions tailored to meet specific requirements, ensuring that every product stands out
                                    on the shelf.</p>
                            </li>
                            <li>
                                <p style="text-align:justify;"><strong>Get in Touch</strong></p>
                                <p style="text-align:justify;">Ready to take your packaging to the next level? Contact us
                                    today to learn more about our packaging solutions and how we can help your brand make a
                                    lasting impression. Together, let's create packaging that speaks volumes and drives
                                    success.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Info -->

        <div class="border-top mx-auto" style="max-width: 25rem;"></div>
    </main>
@endsection
