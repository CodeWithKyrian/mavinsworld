<x-admin-layout title="Link Instagram Testmonial">
  <div class="content-header">
    <div>
      <h2 class="content-title card-title">Link New Testmonial</h2>
      <p>Copy the instagram post link and paste in the field provided.</p>
    </div>

  </div>
  <form id="product-create-form" enctype="multipart/form-data" action="{{ route('admin.settings.instagram-testmonials.link') }}" method="POST">
    @csrf
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-header">
            <h4>Link</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                  <label class="form-label">Instagram Post URL</label>
                  <input placeholder="https://instagram.com/..." type="text" name="instagram_url"
                    class="form-control" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-4">
                  <label class="form-label">Selection</label>
                  <select class="form-select" name="selection">
                    <option value="percent">First</option>
                    <option value="amount">Second</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row justify-content-end">
              <span>
                <button type="submit" class="btn btn-primary d-inline btn-sm rounded">Link</button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-admin-layout>
