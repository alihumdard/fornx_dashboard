@extends('layouts.main')
@section('title', 'Dashboard')
<style>
    .slider-container {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .slider-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slider-item {
        min-width: 100%;
        flex-shrink: 0;
    }

    .slider-item img {
        width: 100%;
        height: auto;
        /* maintain aspect ratio */
        max-height: 85vh;
        /* prevent overflow */
        object-fit: contain;
        /* image poora visible ho */
    }

    @media (max-width: 640px) {
        .slider-item img {
            max-height: 70vh;
            /* mobile ke liye thoda adjust */
        }
    }
</style>

@section('content')

<h1 class="text-2xl font-bold text-gray-800 mb-6">Invoice</h1>
<div class="mx-auto px-2 sm:px-4 flex flex-col items-center">

    <!-- Slider Container -->
    <div class="slider-container relative w-full max-w-4xl">
        <div class="slider-track" id="sliderTrack">
            <!-- Invoice 1 -->
            <div class="slider-item flex justify-center items-center p-2 sm:p-4">
                <img src="{{ asset('assets/images/invoice_1.jpg') }}" alt="Invoice 1" class="">
            </div>
            <!-- Invoice 2 -->
            <div class="slider-item flex justify-center items-center p-2 sm:p-4">
                <img src="{{ asset('assets/images/invoice_2.jpg') }}" alt="Invoice 2" class="">
            </div>
            <!-- Invoice 3 -->
            <div class="slider-item flex justify-center items-center p-2 sm:p-4">
                <img src="{{ asset('assets/images/invoice_3.jpg') }}" alt="Invoice 3" class="">
            </div>
        </div>

        <!-- Left Button -->
        <button id="prevBtn"
            class="absolute top-1/2 -translate-y-1/2 left-2 sm:left-4 bg-white/90 hover:bg-white shadow-lg rounded-full p-2 sm:p-3 text-gray-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fas fa-chevron-left text-lg sm:text-xl"></i>
        </button>

        <!-- Right Button -->
        <button id="nextBtn"
            class="absolute top-1/2 -translate-y-1/2 right-2 sm:right-4 bg-white/90 hover:bg-white shadow-lg rounded-full p-2 sm:p-3 text-gray-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fas fa-chevron-right text-lg sm:text-xl"></i>
        </button>

        <!-- Slide Indicator -->
        <div class="absolute bottom-2 sm:bottom-3 left-1/2 -translate-x-1/2 bg-black/70 text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm">
            <span id="currentSlide">1</span> / <span id="totalSlides">3</span>
        </div>
    </div>

    <!-- Proceed Button -->
    <a href="{{ route('invoices.information') }}"
        class="mt-6 px-6 py-2 bg-blue-600 text-white font-semibold rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-300">
        Proceed
    </a>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliderTrack = document.getElementById('sliderTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const currentSlideEl = document.getElementById('currentSlide');
        const totalSlidesEl = document.getElementById('totalSlides');

        let currentSlide = 0;
        const totalSlides = document.querySelectorAll('.slider-item').length;

        totalSlidesEl.textContent = totalSlides;

        function updateSlider() {
            sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            currentSlideEl.textContent = currentSlide + 1;

            prevBtn.disabled = currentSlide === 0;
            nextBtn.disabled = currentSlide === totalSlides - 1;
        }

        prevBtn.addEventListener('click', function() {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlider();
            }
        });

        nextBtn.addEventListener('click', function() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
                updateSlider();
            }
        });

        updateSlider();
    });
</script>
@endpush