<script>
    document.addEventListener("DOMContentLoaded", function() {
        var current_page = window.location.pathname.split("/").pop();

        if (current_page === 'news_panel.php') {
            document.getElementById('secondMenu').style.display = 'none';
        } else if (current_page === 'players_panel.php') {
            document.getElementById('firstMenu').style.display = 'none';
        }
    });
</script>
