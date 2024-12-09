<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layout.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('layout.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Buku</h1>

                    <!-- Form -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('books.update', $book->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Judul Buku</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $book->title }}" placeholder="Masukkan judul buku" required>
                                </div>

                                <div class="form-group">
                                    <label for="author">Penerbit</label>
                                    <input type="text" class="form-control" id="author" name="author"
                                        value="{{ $book->author }}" placeholder="Masukkan nama penerbit" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    @if($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="Gambar Buku"
                                        class="img-fluid mt-2" style="max-width: 150px;">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="published_at">Tanggal Terbit</label>
                                    <input type="date" class="form-control" id="published_at" name="published_at"
                                        value="{{ $book->published_at }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    @include('layout.logout')

    @include('layout.vendor')
</body>

</html>