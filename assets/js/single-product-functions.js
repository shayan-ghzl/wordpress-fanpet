jQuery(function ($) {
    $(function () {
        $('.woocommerce-product-gallery__wrapper img').xzoom({ zoomWidth: 400, zoomHeight: 400, tint: '#333', position: 'left', Xoffset: -10 });
        $(".woocommerce-product-gallery__wrapper .wp-post-image").removeAttr("srcset");
        $('.woocommerce-product-gallery__wrapper a').on("click", function (event) {
            event.preventDefault();
        });
        $(document).on('change.wc-variation-form', '.variations select', function (event) {
            $(".woocommerce-product-gallery__wrapper .wp-post-image").removeAttr("srcset");
        });
    });
});