<section  class="homepage-slider" id="home-slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="images/carousel/slider_1.jpg" alt="anh bia 1" />
                    </li>
                    <li>
                        <img src="images/carousel/slider_4.png" alt="anh bia 2" />
                        
                    </li>
                    <li>
                        <img src="images/carousel/slider_5.png" alt="anh bia 3" />
                        
                    </li>
                    <li>
                        <img src="images/carousel/slider_6.png" alt="anh bia 4" />
                        
                    </li>
                    <li>
                        <img src="images/carousel/slider_7.png" alt="anh bia 5" />
                        
                    </li>
                </ul>
            </div>          
            </section>
            <section class="header_text">
                Website chúng tôi chuyên cung cấp các sản phẩm chất lượng có uy tín và mới nhất trên thị trường hiện nay
                <br/>Hãy ghé thăm trang web của chúng tôi và đừng bỏ lỡ các sản phẩm mới nhé!
            </section>
        <script src="js/common.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
            $(function() {
                $(document).ready(function() {
                    $('.flexslider').flexslider({
                        animation: "fade",
                        slideshowSpeed: 4000,
                        animationSpeed: 600,
                        controlNav: false,
                        directionNav: true,
                        controlsContainer: ".flex-container" // the container that holds the flexslider
                    });
                });
            });
        </script>