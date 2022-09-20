<x-app-layout title="Here's what people say about us">
  <div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb light">
        <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
        <span></span> Our Gallery
      </div>
    </div>
  </div>
  <div class="page-content pt-50 pb-30">
    <div class="container">
      <div class="row" style="--bs-gutter-x: .5rem;">
        <div class="col-lg-3 col-md-6 col-12">
          <img src="{{ asset('img/gallery/marvins-gallery-image-1.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-2.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-3.jpeg') }}" alt="">
          <video class="w-100" src="{{ asset('img/gallery/marvins-gallery-video-1.mov') }}"
            poster="{{ asset('img/gallery/marvins-gallery-video-1.png') }}" controls></video>
          <img src="{{ asset('img/gallery/marvins-gallery-image-4.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-5.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-6.jpeg') }}" alt="">

        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <img src="{{ asset('img/gallery/marvins-gallery-image-7.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-8.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-9.jpeg') }}" alt="">
            <video class="w-100" src="{{ asset('img/gallery/marvins-gallery-video-2.MOV') }}"
            poster="{{ asset('img/gallery/marvins-gallery-video-2.png') }}" controls></video>
            <img src="{{ asset('img/gallery/marvins-gallery-image-10.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-11.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-12.jpeg') }}" alt="">
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <img src="{{ asset('img/gallery/marvins-gallery-image-13.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-14.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-15.jpeg') }}" alt="">
            <video class="w-100" src="{{ asset('img/gallery/marvins-gallery-video-3.MP4') }}"
            poster="{{ asset('img/gallery/marvins-gallery-video-3.png') }}" controls></video>
            <img src="{{ asset('img/gallery/marvins-gallery-image-16.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-17.jpeg') }}" alt="">
            <img src="{{ asset('img/gallery/marvins-gallery-image-18.jpeg') }}" alt="">
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <img src="{{ asset('img/gallery/marvins-gallery-image-19.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-20.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-21.jpeg') }}" alt="">
          <video class="w-100" src="{{ asset('img/gallery/marvins-gallery-video-4.mp4') }}"
            poster="{{ asset('img/gallery/marvins-gallery-video-4.png') }}" controls></video>
          <img src="{{ asset('img/gallery/marvins-gallery-image-22.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-23.jpeg') }}" alt="">
          <img src="{{ asset('img/gallery/marvins-gallery-image-24.jpeg') }}" alt="">
        </div>
      </div>
    </div>

  </div>
</x-app-layout>
