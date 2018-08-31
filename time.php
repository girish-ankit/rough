<!DOCTYPE html>
<html>
<body>

<p>The internal clock in JavaScript starts at midnight January 1, 1970.</p>
<p>Click the button to display the number of milliseconds since midnight, January 1, 1970.</p>



<p id="demo"></p>
<p><?php echo time() ?>

<script>

    var n = Math.floor(Date.now() / 1000);
    document.getElementById("demo").innerHTML = n;

</script>

</body>
</html>
