<div class="col col-lg-8 col-12">
    <h3 class="text-center">&nbspPreporučujemo&nbsp<i class="far fa-thumbs-up"></i></h3>
    <div class="row no-gutters d-flex justify-content-around mt-4">
        <?php foreach($products as $product) : ?>
        <div class="product-card flex-column">
            <a href="<?php echo site_url('products/' . $product['slug']); ?>">
                <img src="<?php echo base_url(); ?>assets/img/productimg/<?php echo $product['product_image'] ?>"
                    alt="Prva slika ">
                <h4><?php echo $product['title']; ?></h4>
                <p><?php $karakter_niz = explode(', ', $product['karakteristike']); 
                                        $novi_niz = array($karakter_niz[0], $karakter_niz[1] ?? "-", $karakter_niz[2] ?? "-");
                                    ?>
                    <?php foreach($novi_niz as $string) : ?>
                    <?php echo $string ?><br>
                    <?php endforeach; ?></p>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>
</div>
<!-- container end -->
</section>