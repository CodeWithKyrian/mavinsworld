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
          <img src="{{ asset('img/gallery/EE657988-4301-46FD-8760-0611CF0ED9B5.JPG') }}" alt="">
          <video class="w-100" src="{{ asset('img/gallery/video-two.MOV') }}"
            poster="{{ asset('img/gallery/video-two.png') }}" controls></video>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <img src="{{ asset('img/gallery/influencer-one.jpeg') }}" alt="">
          <video class="w-100" src="{{ asset('img/gallery/video-five.mp4') }}"
            poster="{{ asset('img/gallery/video-five.png') }}" controls></video>

        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <video class="w-100" src="{{ asset('img/gallery/video-one.mov') }}"
            poster="{{ asset('img/gallery/video-one.png') }}" controls></video>
          <video class="w-100" src="{{ asset('img/gallery/video-four.mp4') }}"
            poster="{{ asset('img/gallery/video-four.png') }}" controls></video>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <video class="w-100" src="{{ asset('img/gallery/video-three.MP4') }}"
            poster="{{ asset('img/gallery/video-three.png') }}" controls></video>
        </div>
      </div>
    </div>

  </div>
</x-app-layout>
