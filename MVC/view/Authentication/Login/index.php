<main class="login-bg">
    <form action="?controller=Users&action=confirmLogin" method="post">
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="login-form">
                <!-- Login Heading -->
                <div class="login-heading">
                    <span>Login</span>
                    <p>Enter Login details to get access</p>
                </div>
                <!-- Single Input Fields -->
                <div class="input-box mb-3">
                    <div class="single-input-fields">
                        <label>Username or Email Address</label>
                        <input type="text" placeholder="Username / Email address" name="username" required>
                    </div>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                    </div>
                    <div class="single-input-fields login-check">
                        <input type="checkbox" id="fruit1" name="keep-log">
                        <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a> <br>
                       
                    </div>
                    
                </div>
                <?php
                        if (isset($error) && !empty($error)) {
                            echo '<div class="single-input-fields">
                        <div class=" login-error-container shake-error">
                            <p>' . htmlspecialchars($error) . '</p>
                        </div>
                        </div>';
                        }
                        ?>
                <!-- form Footer -->
                <div class="login-footer">
                    <p>Don’t have an account? <a href="?controller=Users&action=Register">Sign Up</a> here</p>
                    <input type="submit" class="submit-btn3" value="Login">
                </div>
            </div>
        </div>
    </form>
    
    <!-- login Area End -->
</main>