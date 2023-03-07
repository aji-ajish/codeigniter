<body>

    <div id="container">
        <h1>Welcome <?= $this->session->userdata('name'); ?></h1>
        <table class="my-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Page</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="<?= base_url('user/saveData') ?>">User</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href="<?= base_url('Usersignup/signup') ?>">signup</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a href="<?= base_url('Usersignup/login') ?>">login</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><a href="<?= base_url('Fileupload/fileUpload') ?>">File Upload</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><a href="<?= base_url('Importexcel/importExcel') ?>">Import excel</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><a href="<?= base_url('country/') ?>">Ajax</a></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><a href="<?= base_url('1151/api') ?>">Api Call</a></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><a href="<?= base_url('AutoComplete/') ?>">Auto Complete</a></td>
                </tr>
            </tbody>
        </table>
        <div id="body">
            <form action="<?= base_url('welcome/save') ?>" method="post">
                <input type="text" name="name" id=""><br>
                <input type="submit" value="submit">
            </form>
        </div>
        <?php if ($this->session->has_userdata('name')) { ?>
            <a href="<?= base_url('welcome/clear') ?>">Clear</a>
        <?php } ?>
</body>

</html>