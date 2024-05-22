<h3>Login Ke Halaman Members</h3>
<?php if ($this->session->flashdata('err')) {
    echo "<div class='error'><ul class='pesan'>" . $this->session->flashdata('err') . "</ul></div>";
} ?>
<form action="<?php echo base_url("Loginsignup/apiAuth"); ?>" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td><input type="text" name="email" class="input" /></td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" class="input" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login" value="Login" class="tbl-biru" /></td>
        </tr>
    </table>
</form>