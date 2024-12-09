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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Buku</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Penerbit</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Ditambahkan Tanggal</th>
                                            <th>Ditambahkan Oleh</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $index => $book)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td> <img src="{{ asset('storage/' . $book->image) }}"
                                                    alt="{{ $book->title }}" width="100px" class="img-thumbnail"> </td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ \Carbon\Carbon::parse($book->published_at)->format('d-m-Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($book->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ optional($book->creator)->name ?? 'Tidak diketahui' }}</td>
                                            <td>
                                                <a href="{{ route('books.show', $book->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('books.edit', $book->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layout.logout')

    @include('layout.vendor')
</body>

</html>