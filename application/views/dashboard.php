<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        /* Define CSS styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .box {
            margin: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 300px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .box h2 {
            margin: 0;
            font-size: 24px;
        }

        .box p {
            margin: 10px 0 0;
            font-size: 18px;
            color: #666;
        }

        .logout-button {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <?php if ($this->session->flashdata('success_message')) : ?>
                <div style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></div>
            <?php endif; ?>

            <h2>Dashboard</h2>
            <p>Welcome <?php echo $this->session->userdata('name') ?></p>
            <a href="<?= base_url('Usersignup/logout') ?>" class="logout-button">Logout</a><br>
            <a href="<?= base_url('Usersignup/changePassword') ?>" class="logout-button">Change Password</a>
        </div>

    </div>

</body>

</html>