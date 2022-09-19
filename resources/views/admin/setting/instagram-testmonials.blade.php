<x-admin-layout title="Instagram Testmonial Settings">
  <div class="content-header">
    <div>
      <h2 class="content-title card-title">All Testmonials</h2>
      <p>This is a list of all the testmonials that appear in the website from instagram.</p>
    </div>
    <div>
      <a href="{{ route('admin.settings.instagram-testmonials.list-all') }}" class="btn btn-primary btn-sm rounded">Link
        new</a>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-body">
      <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
        @foreach ($images as $image)
          <div class="col">
            <div class="card card-product-grid">
              <div href="#" class="img-wrap" style="aspect-ratio: 1/1">
                <img src="{{ $image->url }}" alt="">
              </div>
              <div class="info-wrap d-flex justify-content-center">
                <button class="btn btn-sm font-sm btn-light rounded" onclick="confirmDelete({{ $image }})">
                  <i class="material-icons md-delete_forever"></i> UNLINK
                </button>
              </div>
            </div>
            <!-- card-product  end// -->
          </div>
        @endforeach
      </div>
      <!-- row.// -->
    </div>
  </div>

  @push('inline-scripts')
        <script>
            function confirmDelete(image) {
                $.ajax({
                    url: route('admin.settings.instagram-testmonials.unlink', image.id),
                    type: 'delete',
                    data: {
                        _token: MARVINS.data.csrf,
                    },
                    success: function(data) {
                        MARVINS.plugins.notify('success', 'Product Deleted Succesfully')
                        window.location.reload()
                    }
                })
                // $('#confirm-delete-modal').modal()
            }
        </script>
    @endpush
</x-admin-layout>
