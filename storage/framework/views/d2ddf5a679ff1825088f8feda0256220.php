<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Library -->
        <?php echo $__env->make('frontend.layout.library', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Library -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <div id="loading-wrapper">
            <div id="loading-text">
                <img src="<?php echo e(asset('frontend/images/preloader.gif')); ?>" />
            </div>
            <div id="loading-content"></div>
        </div>
        
        <!-- Header -->
        <?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Header -->
        
        <!-- Content -->
        <?php echo $__env->yieldContent('content'); ?>         
        <!-- End Content -->

        <!-- Footer -->
        <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Footer -->
        
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/jquery.scrolling-tabs.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/swiper.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var changebox = $(".changebox");

                var firstclone = changebox.children(":first").clone();
                changebox.append(firstclone);

                var fsstr = changebox.parent().css("font-size");
                fsstr = fsstr.slice(0, fsstr.indexOf("p"));
                var fs = parseInt(fsstr);

                changebox.css("height", changebox.parent().css("font-size"));
                ChangeSize(0);
                setInterval(Next, 2000);

                function Next() {
                    if (typeof Next.i == 'undefined') {
                        Next.i = 0;
                    }
                    Next.i++;
                    if (Next.i == changebox.children("span").length) {
                        Next.i = 1;
                        changebox.scrollTop(0);
                    }
                    changebox.animate({scrollTop: (fs * Next.i) + Next.i * 5 + 3}, 500);
                    setTimeout(function () {
                        ChangeSize(Next.i);
                    }, 500);

                }

                function ChangeSize(i) {
                    var word = changebox.children("span").eq(i);
                    var wordsize = word.css("width");
                    changebox.css("width", wordsize);
                }
                
                $('.dropdown > a').click(function () {
                    location.href = this.href;
                });
            });
        </script>
        
        <?php echo $__env->yieldContent('javaScript'); ?>
    </body>
</html><?php /**PATH C:\xampp\htdocs\tapariatools.tapariatools.com\resources\views/frontend/master.blade.php ENDPATH**/ ?>