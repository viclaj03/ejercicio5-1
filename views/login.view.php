
<!-- Section-->
<html  lang="es">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <form method="POST" action="login.php" >
                <div class="form-group">
                    <label for="email">Login:</label>
                    <input name="email" type="text" class="form-control <?= isValidClass('user',$errors) ?>" id="email"  placeholder="Enter email" value="<?= $old_user??'' ?>">
                    <?= showError('user',$errors) ?>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" id="password"  placeholder="Enter password">
                </div>
                <a href="register.php" class="btn btn-dark">Register</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</html>
