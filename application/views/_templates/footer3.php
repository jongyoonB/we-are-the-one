</section>

</div>

<script src="/public/js/jquery.min.js"></script>
<script src="/public/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="/public/js/jquery.mixitup.min.js"></script>
<link href="/public/css/magnific-popup.css" rel="stylesheet">
<script src="/public/js/jquery.magnific-popup.min.js"></script>
<script src="/public/js/theme.js"></script>
<script type="text/javascript" src="/public/js/jstz.main.js"></script>
<script src="/public/js/ajax.js"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
<script>

    $(document).ready(function () {
        get_Board();

        $(function () {
            $('#slide-submenu').on('click', function () {
                $(this).closest('.list-group').fadeOut('slide', function () {
                    $('.mini-submenu').fadeIn();
                });

            });

            $('.mini-submenu').on('click', function () {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        });
        function setLine(txa) {
            line = 3;//기본 줄 수

            new_line = txa.value.split("\n").length + 1;
            if (new_line < line) new_line = line;

            txa.rows = new_line;
        }

        $('#toggle').click(function () {
            toggle_time_visible();
        });
        function toggle_time_visible() {
            document.getElementById('time').style.display = 'inline';
            document.getElementById('toggle_submit').style.display = 'inline';
        }
    });



</script>


</body>
</html>