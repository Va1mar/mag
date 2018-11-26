    <footer id="footer"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
    </footer><!--/Footer-->



    <script src="/template/js/jquery.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
    <script src="/template/js/jquery.scrollUp.min.js"></script>
    <script src="/template/js/price-range.js"></script>
    <script src="/template/js/jquery.prettyPhoto.js"></script>
    <script src="/template/js/main.js"></script>

    <script src="/template/js/jquery.cycle2.min.js"></script>
    <script src="/template/js/jquery.cycle2.carousel.min"></script>

    <script>
        $(document).ready(function() {
            $(".add-to-cart").click(function() {
                var id = $(this).attr("data-id");
                var count = $('.product-count').val();
                
                if(!count)
                    count = 1;
                
                $.post("/cart/addAjax/"+id, {count: count}, function(data) {
                    $("#cart-count").html(data);
                });
                return false;
            });
        });
        
        $(document).ready(function() {
            $(".deleteImage").click(function() {
                var data_id = $(this).attr("data-id");
                
                $(this).parent('a').parent('td').parent('tr').fadeOut();
                
                $.post("/cart/delete/"+data_id, {}, function(data) {
                    var info = JSON.parse(data);
                    
                    $('.total_price').text(info['total_price']);
                    $('#cart-count').text(info['count_items']);
                });
            });
        });

    </script>
</body>
</html>