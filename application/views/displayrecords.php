<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .my-table {

            border-collapse: collapse;
            width: 100%;
        }

        .my-table th,
        .my-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .my-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <a href="<?= base_url() ?>User/saveData">Add Users</a>
    <table class="my-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($data as $row) {
                $i++;
            ?>
                <tr>
                    <td> <?php echo $i ?></td>
                    <td> <?php echo $row->first_name ?></td>
                    <td> <?php echo $row->last_name ?></td>
                    <td> <?php echo $row->email?></td>
                    <td> <?php echo $row->categories?></td>
                    <td><a href="<?= base_url("User/updateData/".$row->id) ?>"> Edit</a><br><br>
                        <a href="deleteData?id=<?php echo $row->id ?>"> Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



</body>

</html>