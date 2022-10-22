@dd($buku)

<x-app-layout>
  <div class="row justify-content-between align-items-center mb-3">
    <div class="col col-lg-7">
      <h2 class="text-nowrap">Tambah Buku</h2>
    </div>
    <div class="col col-lg-5 d-flex justify-content-end">
      <button type="button" class="btn btn-primary btn-sm text-nowrap" id="btn-add" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        Tambah Buku
      </button>
    </div>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row">
    <div class="table-responsive">
      <table class="table table-bordered border-dark w-100">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="text-center text-nowrap">No</th>
            <th scope="col" class="text-center text-nowrap">Judul Buku</th>
            <th scope="col" class="text-center text-nowrap">Penulis</th>
            <th scope="col" class="text-center text-nowrap">Penerbit</th>
            <th scope="col" class="text-center text-nowrap">Kategori</th>
            <th scope="col" class="text-center text-nowrap">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if (count($buku) > 0)
            @foreach ($buku as $item)
              <tr>
                <th scope="row" class="text-center text-nowrap">{{ $loop->iteration }}</th>
                <td class="text-nowrap">{{ $item->judul_buku }}</td>
                <td class="text-center text-nowrap">{{ $item->penulis }}</td>
                <td class="text-center text-nowrap">{{ $item->penerbit }}</td>
                <td class="text-center text-nowrap">{{ $item->kategori }}</td>
                <td>
                  <div class="d-flex gap-2 justify-content-center">
                    <button type="button" class="btn-edit btn btn-sm btn-warning border-0" data-bs-toggle="modal"
                      data-bs-target="#staticBackdrop" data-id-buku="{{ $item->id_buku }}">
                      Edit
                    </button>
                    <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus buku ini?')">
                        Delete
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center">Kamu belom punya buku :(</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>

<div class="modal fade book-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title modal-title-book fs-5" id="staticBackdropLabel">Form Tambah data buku</h1>
        <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Buku</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
          </div>
          <div class="mb-3">
            <label for="judul_buku" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="judul_buku" placeholder="Belajar Pemrograman PHP"
              name="judul_buku">
          </div>
          <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" placeholder="Deo Subarno" name="penulis">
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" placeholder="Penerbit Informatika"
              name="penerbit">
          </div>
          <div class="mb-3">
            <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
            <input type="text" class="form-control" id="jumlah_halaman" placeholder="675" name="jumlah_halaman">
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Kategori Buku</label>
            <select class="form-select" name="id_kategori" id="id_kategori">
              @foreach ($kategori as $item)
                <option value="{{ $item->id_kategori }}">
                  {{ $item->kategori }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
            id="close-modal">Tutup</button>
          <button type="submit" class="btn btn-submit btn-sm btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const config = {
    routes: {
      storeBook: "{{ route('buku.store') }}",
      updateBook: "{{ route('buku.update', ':id_buku') }}"
    }
  }
</script>
<script src="{{ asset('js/index.js') }}"></script>
