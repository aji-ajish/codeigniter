<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 1px 1px 5px #ccc;
        }

        label {
            color: Black;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="<?= base_url('Usersignup/resetPassword') ?>" method="post">
            <h2>Forgot Password</h2>
            <br>
            <?php if ($this->session->flashdata('message')) : ?>
                <div style="color:red;"><?php echo $this->session->flashdata('message'); ?></div>
            <?php endif; ?>
            <?php if (isset($error)) { ?>
                <div style="color:red"><?php echo $error; ?></div>
            <?php } ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <div style="color:red"><?php echo form_error('email'); ?></div>
            </div>
            <input type="submit" value="Submit" />
        </form>

    </div>

</body>

</html>