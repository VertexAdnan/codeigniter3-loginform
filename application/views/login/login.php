<body>
    <div class="loginform">
        <form method="post">
            <?php
            $msg = $this->session->flashdata('message');
            $customerid = $this->session->userdata('customerid');
            if (isset($msg)) {
                echo "<p>" . $msg . "</p>";
            }

            ?>
            <label for="username">Username</label>
            <input type="text" name="username">

            <label for="password">Password</label>
            <input type="text" name="password">

            <button type="submit" id="loginbutton" name="login">Login</button>
            <?php
            if (isset($customerid)) {
                echo '<a href="' . base_url('logout') . '">Logout</a>';
            }
            ?>
        </form>
    </div>
</body>

</html>