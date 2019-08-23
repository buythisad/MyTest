<?php
/**
 * The Sidebar containing the main widget area
 */
?>
<?php if ( is_active_sidebar( 'sidebar-right' ) ) { ?>
<div id="sidebar-right" class="right-sidebar">
    <?php dynamic_sidebar('sidebar-right'); ?>
</div>

<?php } ?>