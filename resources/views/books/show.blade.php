<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fc;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #4e73df;
            color: white;
            border-radius: 12px 12px 0 0;
        }

        .card-title {
            font-size: 1.5rem;
            margin: 0;
        }

        .card-body {
            padding: 2rem;
        }

        .detail-label {
            font-weight: bold;
            color: #4e73df;
            margin-bottom: 0.2rem;
        }

        .detail-value {
            font-size: 1rem;
            color: #5a5c69;
            margin-bottom: 1rem;
        }

        .book-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-back {
            background-color: #4e73df;
            color: white;
            font-weight: bold;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #2e59d9;
            color: white;
        }
    </style>
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
                    <h1 class="h3 mb-4 text-gray-800">Detail Buku</h1>

                    <!-- Book Details Card -->
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="card-title text-center">{{ $book->title }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Book Image -->
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                                        class="book-image">
                                </div>

                                <!-- Book Details -->
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <span class="detail-label">Judul Buku:</span>
                                        <p class="detail-value">{{ $book->title }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="detail-label">Penerbit:</span>
                                        <p class="detail-value">{{ $book->author }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="detail-label">Tanggal Terbit:</span>
                                        <p class="detail-value">
                                            {{ \Carbon\Carbon::parse($book->published_at)->format('d-m-Y') }}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="detail-label">Ditambahkan Tanggal:</span>
                                        <p class="detail-value">
                                            {{ \Carbon\Carbon::parse($book->created_at)->format('d-m-Y') }}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="detail-label">Ditambahkan Oleh:</span>
                                        <p class="detail-value">{{ optional($book->creator)->name ?? 'Tidak diketahui'
                                            }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('books.index') }}" class="btn btn-back">Kembali</a>
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