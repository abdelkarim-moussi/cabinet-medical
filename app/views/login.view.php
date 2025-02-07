<?php
require_once 'components/header.php';
?>

<div class="col-lg-8 col-12 mx-auto" style="margin-top:30px;margin-bottom:30px;">
    <div class="booking-form">
                                
        <h2 class="text-center mb-lg-3 mb-2">Sign Up</h2>
                            
        <form role="form" action="#booking" method="post">
            <div class="col">

                <div class="col-6 mx-auto">
                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                </div>

                <div class="col-6 mx-auto">
                    <input type="password" name="password" id="password" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" placeholder="password">
                </div>

                <div class="col-lg-3 col-md-4 col-6 mx-auto">
                    <button type="submit" class="form-control" id="submit-button">Login</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php require_once 'components/footer.php';?>