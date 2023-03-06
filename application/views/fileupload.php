<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style for file upload form */
        #upload-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 400px;
        }

        #upload-form input[type=file] {
            margin-top: 20px;
            font-size: 18px;
            color: #aaa;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: transparent;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
        }

        #upload-form input[type=file]:focus {
            outline: none;
            border-color: #4b4bff;
        }

        #upload-form input[type=submit] {
            margin-top: 20px;
            font-size: 20px;
            color: #fff;
            background-color: #4b4bff;
            border: none;
            border-radius: 10px;
            padding: 10px 30px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        #upload-form input[type=submit]:hover {
            background-color: #333;
        }

        /* Style for file table */
        #file-table {
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 800px;
        }

        #file-table table {
            width: 100%;
            border-collapse: collapse;
        }

        #file-table th,
        #file-table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        #file-table th {
            background-color: #4b4bff;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
        }

        #file-table tbody tr:hover {
            background-color: #f2f2f2;
        }

        .error {
            color: red;
            font-size: 18px;
        }

        img {
            width: 100px;
            height: 100px;
        }
    </style>


</head>

<body>
    <div>
        <div id="upload-form">
            <label for="">Single File Upload</label>
            <div class="error">
                <?php if (isset($sferror)) {
                    echo $sferror;
                }
                ?> <?php if ($this->session->flashdata('msg')) : ?>
                    <div style="color:green;"><?php echo $this->session->flashdata('msg'); ?></div>
                <?php endif; ?>
            </div>
            <form action="<?= base_url('Fileupload/singleFileUpload') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="file" multiple>
                <input type="submit" value="Upload">
            </form>
        </div>
        <div id="upload-form">
            <div class="error">
                <?php if (isset($error)) {
                    echo $error;
                } ?>
            </div>
            <label for="">Multiple File Upload</label>
            <form action="<?= base_url('Fileupload/multiFileUpload') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" multiple>
                <input type="submit" value="Upload">
            </form>
        </div>
        <div id="file-table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>File Size</th>
                        <th>File</th>
                    </tr>
                </thead>
                <pre></pre>
                <tbody>
                    <?php $i = 0;
                    foreach ($filedata as $row) {

                        $i++;
                    ?>
                        <tr>
                            <td> <?= $i ?></td>
                            <td> <?= $row->file_name ?></td>
                            <td> <?= $row->image_type ?></td>
                            <td> <?= $row->file_size ?></td>
                            <td> <img src="<?php echo  base_url() . 'uploads/' . $row->file_name ?>" alt="" srcset=""></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>