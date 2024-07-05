@extends('layouts.homeUser')

@section('content')
    <main class="container" style="padding-top:20px;">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <img src="{{ $acara->thumbnail }}" alt="">
                <h1 class="display-4 fst-italic">{{ $acara->name }}</h1>
                <p class="lead my-3">{{ $acara->description }}</p>

            </div>
        </div>




        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    From the Firehose
                </h3>

                <article class="blog-post">
                    <h2 class="blog-post-title">Description Events</h2>
                    <h4>Acara {{ $acara->category->name }}</h1>
                        <p class="blog-post-meta">{{ $acara->waktu->format('d-m-Y') }} </p>

                        <p>{{ $acara->description }}</p>
                        <hr>
                        <p>Map</p>
                        <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d7933.923513599259!2d106.80766924932085!3d-6.135840833655163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMDgnMDYuMiJTIDEwNsKwNDgnNTAuMCJF!5e0!3m2!1sid!2sid!4v1720220964328!5m2!1sid!2sid{{ $acara->longitude }}!3d{{ $acara->latitude }}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z0KHQsNCx0LjQvNCw0Y8g0LTQsNC60LDRhtC40Y8!5e0!3m2!1sen!2sid!4v1600962355748!5m2!1sen!2sid">
                        </iframe>
                        <h2>Lokasi</h2>
                        <p class = "text-uppercase">{{ $acara->lokasi }}</p>
                </article>

                <article class="blog-post">
                    <h3>Slot Terdaftar</h3>
                    <p>And don't forget about tables in these posts:</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Upvotes</th>
                                <th>Downvotes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alice</td>
                                <td>10</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <td>Bob</td>
                                <td>4</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Charlie</td>
                                <td>7</td>
                                <td>9</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Totals</td>
                                <td>21</td>
                                <td>23</td>
                            </tr>
                        </tfoot>
                    </table>

                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other
                        highly repetitive body text used throughout.</p>
                </article>

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1"
                        aria-disabled="true">Newer</a>
                </nav>

            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="custom-card">
                        <h5 class="checkout-out">Check Out Tiket</h5>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="custom-card-title ">{{ $acara->ticket->name }}</p>
                                <p class="custom-card-price ">Rp {{ number_format($acara->ticket->harga, 0, ',', '.') }}
                                </p>

                            </div>
                        </div>
                        {{-- <div class ="d-flex justify-content-end mt-3 "> --}}
                        <a href="{{ route('checkout', $acara->slug) }}" class="btn btn-primary ">Buy
                            Ticket</a>
                        {{-- </div> --}}
                    </div>



                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">Acara Serupa</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">Acara Serupa 2</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
