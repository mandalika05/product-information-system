<?php

require_once 'config.php';
require_once 'products.php';
require_once 'functions.php';

$totalProduk = count($products);
$totalStok = hitungTotalStok($products);
$stokKritis = hitungStokKritis($products);
$totalNilaiStok = hitungTotalNilaiStok($products);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo APP_NAME; ?></title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #20243a;
        }

        .container {
            width: 92%;
            max-width: 1250px;
            margin: 35px auto;
        }

        /* HEADER */

        .header {
            background: linear-gradient(135deg, #272b55, #4f46a5);
            padding: 35px;
            border-radius: 20px;
            color: white;
            margin-bottom: 25px;
            box-shadow: 0 12px 30px rgba(39, 43, 85, 0.18);
        }

        .header-small {
            font-size: 13px;
            letter-spacing: 1px;
            opacity: 0.75;
            margin-bottom: 8px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.85;
        }

        /* SUMMARY */

        .summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border-radius: 17px;
            border: 1px solid #e8eaf2;
            box-shadow: 0 6px 18px rgba(31, 35, 60, 0.06);
        }

        .summary-label {
            color: #8589a3;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: bold;
            color: #292d50;
        }

        .summary-note {
            font-size: 12px;
            margin-top: 7px;
            color: #8a8fa8;
        }

        .critical-number {
            color: #dc4654;
        }

        /* TABLE BOX */

        .table-box {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 7px 22px rgba(31, 35, 60, 0.06);
            overflow-x: auto;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .table-heading h2 {
            font-size: 21px;
            color: #292d50;
        }

        .table-heading p {
            color: #8b90a7;
            font-size: 13px;
            margin-top: 5px;
        }

        .data-count {
            background: #eeedff;
            color: #5146a5;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* TABLE */

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #f0f1f8;
            color: #565b76;
            padding: 14px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        td {
            padding: 16px 14px;
            border-bottom: 1px solid #eceef4;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafaff;
        }

        .product-id {
            color: #6358c7;
            font-weight: bold;
        }

        .product-name {
            font-weight: bold;
            color: #292d50;
        }

        .description {
            color: #777d97;
            line-height: 1.5;
            max-width: 270px;
        }

        .category {
            display: inline-block;
            background: #eeeaff;
            color: #6358c7;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: bold;
        }

        .price {
            font-weight: bold;
            color: #292d50;
            white-space: nowrap;
        }

        /* STATUS */

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .safe {
            background: #e5f7ef;
            color: #16805c;
        }

        .critical {
            background: #ffe7e9;
            color: #d43848;
        }

        /* TOTAL */

        .total-box {
            margin-top: 22px;
            padding: 20px;
            background: linear-gradient(135deg, #f0efff, #f8f7ff);
            border: 1px solid #e4e1ff;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            color: #696e88;
            font-size: 13px;
        }

        .total-value {
            color: #49409c;
            font-size: 23px;
            font-weight: bold;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            margin: 25px 0;
            color: #9da1b5;
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {

            .summary {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .container {
                width: 94%;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 25px;
            }

            .table-box {
                padding: 17px;
            }

        }

    </style>

</head>


<body>

<div class="container">


    <!-- HEADER -->

    <div class="header">

        <div class="header-small">
            PEMROGRAMAN WEB • PRODUCT MANAGEMENT
        </div>

        <h1>
            <?php echo APP_NAME; ?>
        </h1>

        <p>
            Sistem informasi untuk menampilkan dan memantau data produk
            serta nilai persediaan secara sederhana.
        </p>

    </div>


    <!-- SUMMARY -->

    <div class="summary">


        <div class="summary-card">

            <div class="summary-label">
                TOTAL PRODUK
            </div>

            <div class="summary-value">
                <?php echo $totalProduk; ?>
            </div>

            <div class="summary-note">
                Data produk terdaftar
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">
                TOTAL STOK
            </div>

            <div class="summary-value">
                <?php echo $totalStok; ?>
            </div>

            <div class="summary-note">
                Unit persediaan
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">
                STOK KRITIS
            </div>

            <div class="summary-value critical-number">
                <?php echo $stokKritis; ?>
            </div>

            <div class="summary-note">
                Produk membutuhkan perhatian
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-label">
                NILAI PERSEDIAAN
            </div>

            <div class="summary-value">
                Rp <?php echo number_format($totalNilaiStok, 0, ',', '.'); ?>
            </div>

            <div class="summary-note">
                Total nilai seluruh stok
            </div>

        </div>


    </div>


    <!-- PRODUCT TABLE -->

    <div class="table-box">


        <div class="table-heading">

            <div>

                <h2>
                    Daftar Produk
                </h2>

                <p>
                    Informasi produk dan kondisi persediaan
                </p>

            </div>

            <div class="data-count">
                <?php echo $totalProduk; ?> DATA
            </div>

        </div>


        <table>

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Produk</th>

                    <th>Kategori</th>

                    <th>Harga</th>

                    <th>Stok</th>

                    <th>Deskripsi</th>

                </tr>

            </thead>


            <tbody>


            <?php foreach ($products as $product): ?>

                <tr>

                    <td>

                        <span class="product-id">

                            #<?php echo str_pad($product["id"], 2, "0", STR_PAD_LEFT); ?>

                        </span>

                    </td>


                    <td>

                        <div class="product-name">

                            <?php echo $product["nama"]; ?>

                        </div>

                    </td>


                    <td>

                        <span class="category">

                            <?php echo $product["kategori"]; ?>

                        </span>

                    </td>


                    <td>

                        <span class="price">

                            Rp <?php echo number_format($product["harga"], 0, ',', '.'); ?>

                        </span>

                    </td>


                    <td>


                        <?php if ($product["stok"] < STOK_KRITIS): ?>

                            <span class="status critical">

                                <?php echo $product["stok"]; ?> Unit
                                • Kritis

                            </span>


                        <?php else: ?>

                            <span class="status safe">

                                <?php echo $product["stok"]; ?> Unit
                                • Aman

                            </span>


                        <?php endif; ?>


                    </td>


                    <td>

                        <div class="description">

                            <?php echo $product["deskripsi"]; ?>

                        </div>

                    </td>


                </tr>


            <?php endforeach; ?>


            </tbody>

        </table>


        <!-- TOTAL -->

        <div class="total-box">

            <div class="total-label">

                TOTAL NILAI SELURUH PERSEDIAAN

            </div>

            <div class="total-value">

                Rp <?php echo number_format($totalNilaiStok, 0, ',', '.'); ?>

            </div>

        </div>


    </div>


    <!-- FOOTER -->

    <div class="footer">

        <?php echo APP_NAME; ?> • Version <?php echo APP_VERSION; ?>

    </div>


</div>

</body>

</html>
