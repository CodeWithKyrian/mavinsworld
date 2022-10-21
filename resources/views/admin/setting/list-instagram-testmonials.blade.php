<x-admin-layout title="Instagram Testmonial Settings">
  <div class="content-header">
    <div>
      <h2 class="content-title card-title">All Instagram Posts</h2>
      <p>This is a list of all the instagram posts from your page (videos excluded).</p>
    </div>

  </div>
  <div class="card mb-4">
    <div class="card-body">
      <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
        @foreach ($feeds as $feed)
          @if ($feed->isImage())
            <div class="col">
              <div class="card card-product-grid">
                <a href="{{ route('admin.settings.instagram-testmonials.link',
                [
                    'instagram_id' => $feed->id,
                    'url' => $feed->url,
                    'permalink' => $feed->permalink
                ])
                }}"
                  class="img-wrap" style="aspect-ratio: 1/1">
                  <img src="{{ $feed->url }}" alt="">
                </a>
              </div>
              <!-- card-product  end// -->
            </div>
          @endif
          @if ($feed->isCarousel())
            @foreach ($feed->children as $feed_child)
              <div class="col">
                <div class="card card-product-grid">
                  <a href="{{
                    route('admin.settings.instagram-testmonials.link',
                        [
                            'instagram_id' => $feed_child['id'],
                            'url' => $feed_child['url'],
                            'permalink' => $feed->permalink
                        ])
                    }}"
                    class="img-wrap" style="aspect-ratio: 1/1">
                    <img src="{{ $feed_child['url'] }}" alt="">
                  </a>
                </div>
              </div>
            @endforeach
          @endif
        @endforeach
      </div>
      <!-- row.// -->
    </div>
  </div>
</x-admin-layout>
