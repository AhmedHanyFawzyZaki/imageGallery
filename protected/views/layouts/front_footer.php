
        

        <!-- JS and analytics only. -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?= Yii::app()->getBaseUrl(true); ?>/js/front/jquery.js"></script>
        <script src="<?= Yii::app()->getBaseUrl(true); ?>/js/front/bootstrap.js"></script>
        <script src="<?= Yii::app()->getBaseUrl(true); ?>/js/front/waypoints.min.js"></script>

        <script>
            $(document).ready(function() {

                $('.wp2').waypoint(function() {
                    $('.wp2').addClass('animated fadeInUp');
                }, {
                    offset: '75%'
                });

                $('.wp4').waypoint(function() {
                    $('.wp4').addClass('animated fadeInRight');
                }, {
                    offset: '75%'
                });

                $('.wp5').waypoint(function() {
                    $('.wp5').addClass(' animated rotateIn delay-05s');
                }, {
                    offset: '75%'
                });
                
                $('.wp7').waypoint(function() {
                    $('.wp7').addClass('animated bounce');
                }, {
                    offset: '75%'
                });


                $('.wp3').waypoint(function() {
                    $('.wp3').addClass('animated fadeInLeft');
                }, {
                    offset: '75%'
                });

                $('.wp1').waypoint(function() {
                    $('.wp1').addClass('animated fadeIn');
                }, {
                    offset: '75%'
                });

            });
        </script>

    </body>
</html>
