<?php
include 'inc/header.php'
?>
<?php
if(isset($_GET['creatacount'])){
    
}
?>

<body>
    <div class="main">
        <div class="content">
            <div class="login_panel">
                <h3>Existing Customers</h3>
                <!-- <p>Sign in with the form below.</p> -->
                <form action="" method="post" id="member">
                    <input name="username" type="text" value="Username" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="password" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                </form>
                <p class="note">If you forgot your passoword click <a href="#">here</a></p>
                <div class="buttons">
                    <div><button class="grey">Sign In</button></div>
                </div>
            </div>
            <div class="register_account">
                <h3>Register New Account</h3>
                <form method="POST" action="">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <input type="text" value="Name" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                                    </div>
                                    <div>
                                        <input type="text" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                                    </div>
                                    <div>
                                        <input type="text" value="E-Mail" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-Mail';}">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" value="Address" name="address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}">
                                    </div>
                                    <!-- <div>
                                            <select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                                                <option value="null">Select a Country</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>

                                            </select>
                                        </div> -->

                                    <div>
                                        <input type="text" value="Phone" name="phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="search">
                        <!-- <div><button class="grey"></button></div> -->
                        <input type="submit" name="creatacount" value="Creat Account">
                    </div>
                    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                    <div class="clear"></div>
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>

</html>