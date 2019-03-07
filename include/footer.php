
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script>

function checkEmail() {
var email = document.getElementById('txtEmail');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(email.value)) {
alert('Please provide a valid email address');
document.getElementById("txtEmail").value = "";
document.getElementById('txtEmail').style.border ="1px solid red";
email.focus;
return false;
 	}
}
</script>

<footer class="bg-dark text-center">
  <div class="container">
    <p>Design and Developed by &copy; Muhammad Younas All right reserved.</p>
    <!-- <a href="contact.php">Click Here</a> -->
  </div>
</footer>

</body>
</html>