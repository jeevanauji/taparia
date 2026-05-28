<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo e(asset('frontend/images/latestlogotapariaw.png')); ?>" class="img-fluid" style="width:75%" />
                <p class="my-4">
                    Taparia is committed to delivering reliable products that meet customer needs. Integrity, innovation, and a focus on quality drive every part of our work. We also prioritize sustainable practices and continuous growth through technology.
                </p>

                <p class="d-flex add-c">
                    <i class="fa fa-map"></i> 
                    423/424 A-2, Shah & Nahar, Lower Parel(w), Mumbai 400 013
                </p>
                <p class="d-flex add-c">
                    <i class="fa fa-envelope"></i> 
                    <a href="mailto:sales@tapariatools.com" class="text-white" style="text-decoration: none;">
                        sales@tapariatools.com
                    </a>
                </p>
                <p class="d-flex add-c">
                    <i class="fa fa-phone"></i> 
                    <a href="tel:+912261478600" class="text-white" style="text-decoration: none;">
                        +91-22-61478600
                    </a>
                </p>
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-4 mt-3 mt-md-0">
                        <h5>Explore Us</h5>
                        <ul class="list-unstyled footerlinks">
                            <li><a href="<?php echo e(url('')); ?>">Home</a></li>
                            <li><a href="<?php echo e(url('about-us')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(url('products')); ?>">Products</a></li>
                            <li><a href="<?php echo e(url('investors-desk')); ?>">Investors Desk</a></li>                            
                            <li><a href="<?php echo e(url('downloads')); ?>">Downloads</a></li>                            
                            <li><a href="<?php echo e(url('distributors')); ?>">Distributors</a></li>
                            <li><a href="<?php echo e(url('contact-us')); ?>">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                        <h5>Products</h5>
                        <ul class="list-unstyled footerlinks">
                            <?php
                                use App\Models\Category;
                                $categoriesData = Category::where('isDeleted', 1)->orderBy('id', 'ASC')->get();
                            ?>
                            <?php $__currentLoopData = $categoriesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(url('category/' . Str::slug($footerCategory->name))); ?>">
                                    <?php echo e(ucwords(strtolower($footerCategory->name))); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>
                    <div class="col-md-4 mt-3 mt-md-0">
                        <h5>Legal Links</h5>
                        <ul class="list-unstyled footerlinks">
                            <li><a href="<?php echo e(url('privacy-policy')); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo e(url('terms-of-service')); ?>">Terms of Service</a></li>
                            <li><a href="<?php echo e(url('cookies-policy')); ?>">Cookies Policy</a></li>
                            <li><a href="<?php echo e(url('privacy-rights')); ?>">Privacy Rights</a></li>
                            <li><a href="<?php echo e(url('certification-policy')); ?>">Certification Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright d-md-flex align-items-center">
            <span class="ms-auto">Copyright © 2026 - Tapariatools</span>
        </div>
    </div>
</footer>
<script>

  document.querySelectorAll('.accordion-button[data-bs-toggle="collapse"]').forEach(button => {
    button.addEventListener('click', function (e) {
      const targetSelector = this.getAttribute('data-bs-target');
      const collapseEl = document.querySelector(targetSelector);

      const bsCollapse = bootstrap.Collapse.getInstance(collapseEl) ||
                         new bootstrap.Collapse(collapseEl, { toggle: false });

      // Toggle manually
      if (collapseEl.classList.contains('show')) {
        bsCollapse.hide();
      } else {
        bsCollapse.show();
      }

      // Optional: toggle "active" class on the parent accordion-item
      const accordionItem = this.closest('.accordion-item');
      if (accordionItem) {
        accordionItem.classList.toggle('active');
      }

      e.preventDefault(); // Prevent Bootstrap from handling it automatically
    });
  });
</script>

<?php /**PATH C:\xampp\htdocs\tapariatools.tapariatools.com\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>