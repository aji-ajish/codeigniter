<!DOCTYPE html>
<html>

<head>
    <title>File Upload and View Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
            font-size: 36px;
            color: #555;
            text-shadow: 1px 1px 0 #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .file-input {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .file-input label {
            font-size: 18px;
            margin-left: 10px;
        }

        .file-input input[type="file"] {
            display: none;
        }

        .file-input .button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .file-input .button:hover {
            background-color: #3e8e41;
        }

        .file-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .file-table th,
        .file-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .file-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .file-table td a {
            color: #007bff;
            text-decoration: none;
        }

        .file-table td a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Import Excel File</h1>
        <div>please <a href=" <?= base_url('assets/sample.xls') ?>" download="">download </a>the sample excel file</div>
        <form action="<?= base_url('Importexcel/importData') ?>" enctype="multipart/form-data" method="post">
            <div class="file-input">

                <label for="file-upload"><i class="fas fa-cloud-upload-alt"></i> Choose a file:</label>
                <div>
                    <input type="file" id="file-upload" name="file">
                    <input type="submit" value="submit" name="submit" class="button" />
                </div>

            </div>
        </form>
        <div>
            <h3>Export Data </h3> <a style="" href="<?= base_url('Importexcel/exportData') ?>">Export Data</a>
        </div>
        <table class="file-table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($getImportData) > 0) {
                    foreach ($getImportData as $gettData) {
                ?>
                        <tr>
                            <td><?= $gettData->name ?></td>
                            <td><?= $gettData->email ?></td>
                            <td><?= $gettData->phone ?></td>
                        </tr>
                    <?php   }
                } else { ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">NO data</td>
                    </tr>
                <?php   } ?>
                <!-- add more rows here -->
            </tbody>
        </table>
    </div>
</body>

</html