
<!-- Section-->
<html  lang="es">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <form method="POST" action="register.php" >
                <div class="form-group">
                    <label for="user">Nombre:</label>
                    <input name="user" type="text" class="form-control <?= isValidClass('user',$errors) ?>" id="user"  placeholder="Enter user" value="<?= $old_user??'' ?>">
                    <?= showError('user',$errors) ?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control <?= isValidClass('user',$errors) ?>" id="email"  placeholder="Enter user" value="<?= $old_user??'' ?>">
                    <?= showError('email',$errors) ?>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" id="password"  placeholder="Enter password">
                </div>
                <div class="form-group">
                    <input name="password2" type="password" class="form-control <?= isValidClass('password2',$errors) ?>" id="password2"  placeholder="Repeate password">
                    <?= showError('password2',$errors) ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</html>
