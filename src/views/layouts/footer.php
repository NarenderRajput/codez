<script src="<?php echo $theme_assets . 'vendors/@coreui/coreui/js/coreui.bundle.min.js' ?>"></script>
<script src="<?php echo $theme_assets . 'vendors/simplebar/js/simplebar.min.js' ?>"></script>
<script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
        if (header) {
            header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
    });
</script>