<div class="footer navbar-fixed-bottom">
</div>

<script src="/public/jquery-2.2.0/jquery-2.2.0.js"></script>
<script src="/public/js/jquery.ddslick.js"></script>
<script src="/public/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="/public/js/vegas.min.js"></script>
<script>

    $(function () {
        $('body').vegas({
            slides: [
                {src: '/public/img/h_img/bg1.jpg'},
                {src: '/public/img/h_img/bg2.jpg'},
                {src: '/public/img/h_img/bg3.jpg'}
            ],
            delay: 3500
        });
    });
</script>
<script>
    $('#htmlselect').ddslick({
        onSelected: function(selectedData){
        }
    });
</script>


</body>
</html>
