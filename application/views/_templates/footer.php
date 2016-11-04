</div>
<div class="footer navbar-fixed-bottom">
</div>

<script src="/public/js/jquery.min.js"></script>
<script src="/public/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
<script src="/public/js/jquery.mixitup.min.js"></script>
<link href="/public/css/magnific-popup.css" rel="stylesheet">
<script src="/public/js/jquery.magnific-popup.min.js"></script>
<script src="/public/js/theme.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // Mix It Up Gallery setup
        $('.container-projects').mixItUp();

        // Google Maps setup
        var googlemap = new google.maps.Map(
            document.getElementById('googlemap'),
            {
                center: new google.maps.LatLng(44.5403, -78.5463),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
        );
    });
</script>

</body>
</html>
