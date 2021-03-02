<script>
    var timeDisplay = document.getElementById("time");


    function refreshTime() {
        var dateString = new Date().toLocaleString("en-US", {
            timeZone: "Asia/Jakarta"
        });
        var formattedString = dateString.replace(", ", " - ");
        timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);
</script>
</body>

</html>