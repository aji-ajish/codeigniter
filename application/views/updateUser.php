<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type=text],
        input[type=email] {
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

        <form method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $user->first_name ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $user->last_name ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user->email ?>" required>

            <div class="">
                <label for="password">Categories:</label>
               <input type="checkbox" name="categories[]" id="" value="Movie" <?= in_array('Movie',$categry_list)?'checked':'';?>>Movie
               <input type="checkbox" name="categories[]" id="" value="Book"  <?= in_array('Book',$categry_list)?'checked':'';?>>Book
               <input type="checkbox" name="categories[]" id="" value="Game"  <?= in_array('Game',$categry_list)?'checked':'';?>>Game
               <input type="checkbox" name="categories[]" id="" value="Internet"  <?= in_array('Internet',$categry_list)?'checked':'';?>>Internet
            </div>
            <br/><br/>
            <input type="submit" name="update" value="Update">
        </form>

    <a href="<?= base_url() ?>User/displayData">View Users</a>
</body>

</html>