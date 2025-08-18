@extends('layouts.main')
@section('title', 'Dashboard')

<style>
.slider-container {
    position: relative;
    overflow: hidden;
}
.slider-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
}
.slider-item {
    min-width: 100%;
    flex-shrink: 0;
}
</style>

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Invoice</h1>
<div class="mx-auto px-4 max-w-5xl flex flex-col items-center">

    <!-- Slider Container -->
    <div class="slider-container relative w-full max-w-4xl">
        <div class="slider-track" id="sliderTrack">
            <!-- Invoice 1 -->
            <div class="slider-item flex justify-center items-center p-6">
                <img src="{{ asset('assets/images/invoice_1.jpg') }}" 
                     alt="Invoice 1" 
                     class="rounded-lg object-contain mx-auto">
            </div>
            <!-- Invoice 2 -->
            <div class="slider-item flex justify-center items-center p-6">
                <img src="{{ asset('assets/images/invoice_2.jpg') }}" 
                     alt="Invoice 2" 
                     class="rounded-lg  object-contain mx-auto">
            </div>
            <!-- Invoice 3 -->
            <div class="slider-item flex justify-center items-center p-6">
                <img src="{{ asset('assets/images/invoice_3.jpg') }}" 
                     alt="Invoice 3" 
                     class="rounded-lg object-contain mx-auto">
            </div>
        </div>

        <!-- Left Button -->
        <button id="prevBtn" 
            class="absolute top-1/2 -translate-y-1/2 left-3 md:left-6 bg-white/90 hover:bg-white shadow-lg rounded-full p-3 text-gray-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>

        <!-- Right Button -->
        <button id="nextBtn" 
            class="absolute top-1/2 -translate-y-1/2 right-3 md:right-6 bg-white/90 hover:bg-white shadow-lg rounded-full p-3 text-gray-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

    </div>
    <button class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-300">
  Proceed
</button>

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
