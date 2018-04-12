<footer class="footer">
    <div class="container">
        <div class="row module-wrapper">
            <?php if (is_active_sidebar( 'footer-sidebar-one' )): ?>
            <div class="col-md-3 col-sm-6">
                <?php dynamic_sidebar('footer-sidebar-one'); ?>
            </div><!-- end col -->
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-sidebar-two')): ?>
            <div class="col-md-3 col-sm-6">
                <?php dynamic_sidebar('footer-sidebar-two'); ?>
            </div><!-- end col -->
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-sidebar-three')): ?>
            <div class="col-md-3 col-sm-6">
                <?php dynamic_sidebar('footer-sidebar-three'); ?>
            </div><!-- end col -->
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-sidebar-four')): ?>
            <div class="col-md-3 col-sm-6">
            <?php dynamic_sidebar('footer-sidebar-four'); ?>
            </div>
            <?php endif; ?>
    
        </div><!-- end row -->
    </div>
</footer>