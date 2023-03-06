<!DOCTYPE html>
<html>

<head>
    <style>
        /* Form container */
        .form-container {
            margin: auto;
            max-width: 500px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        /* Form fields */
        .form-field {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form-field label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-field input {
            height: 30px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Submit button */
        .submit-button {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #3e8e41;
        } #file-table {
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
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Sign Up</h2><br>
        <!--  <div style="color:red"><?php echo validation_errors() ?></div> -->
        <form action="<?= base_url('Usersignup/submit') ?>" method="POST">
            <div class="form-field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" />
                <div style="color:red"><?php echo form_error('name'); ?></div>

            </div>

            <div class="form-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" />
                <div style="color:red"><?php echo form_error('email'); ?></div>

            </div>

            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" />
                <div style="color:red"><?php echo form_error('password'); ?></div>
            </div>


            <input type="submit" name="signup" value="Sign up" class="submit-button" />
        </form>
    </div>

    <div id="file-table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Categories</th>
                    </tr>
                </thead>
                <pre></pre>
                <tbody>
                    <!-- <?php $i = 0;
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
                    ?> -->
                </tbody>
            </table>
        </div>
</body>

</html>