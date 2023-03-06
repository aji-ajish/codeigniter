<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <form action="<?= base_url('Usersignup/changeUserPassword') ?>" method="post">
        <h2>Change Password</h2>

        <?php if (isset($message)) { ?>
            <div style="color:red"><?php echo $message; ?></div>
        <?php } ?>
        <label for="old-password">Old Password:</label>
        <input type="password" id="old-password" name="old_password">
        <div style="color:red"><?php echo form_error('old_password'); ?></div>
        <label for="new-password">New Password:</label>
        <input type="password" id="new-password" name="new_password">
        <div style="color:red"><?php echo form_error('new_password'); ?></div>
        <label for="confirm-password">Confirm New Password:</label>
        <input type="password" id="confirm-password" name="confirm_password">
        <div style="color:red"><?php echo form_error('confirm_password'); ?></div>
        <input type="submit" value="Save Changes">
    </form>

</body>

</html>