<div class="col-lg-8 col-md-10 offset-md-1 offset-lg-0 backlight">

<?php 
    $kategorija_id = $product['categories_id'];
    $podkategorija = $product['subcategory'];;
    
    switch($kategorija_id){
        case 1:
        $kategorija = 'Lemilice i propratna oprema';
        break;
        case 2:
        $kategorija = 'Manualni sistemi';
        break;
        case 3:
        $kategorija = 'Izvlačenje isparenja';
        break;
        case 4:
        $kategorija = 'Automatski sistemi';
        break;
        case 5:
        $kategorija = 'Oprema za vizuelnu kontrolu';
        break;
        case 6:
        $kategorija = 'Roboti';
        break;
        case 7:
        $kategorija = 'Antistatički program';
        break;
    }
                            
    switch($podkategorija){
        case 'Lemilice':
        $podkategorija = 'Lemilice';
        break;
        case 'Odeća':
        $podkategorija = 'Antistatička odeća';
        break;
        case 'Podovi':
        $podkategorija = 'Antistatički podovi';
        break;
        case 'p-and-p':
        $podkategorija = 'Pick and Place mašine';
        break;
        case 'Propratni-materijal':
        $podkategorija = 'Propratni oprema materijal';
        break;
        case 'Stanica-vazduh':
        $podkategorija = 'Stanica za topli vazduh';
        break;
        case 'Manualni-printeri':
        $podkategorija = 'Manualni štampači';
        break;
        case 'Desktop-peći':
        $podkategorija = 'Desktop peći';
        break;
        case "Manualni-polagač":
        $podkategorija = 'Manualni SMD polagač';
        break;
        case 'Peći-lemljenje':
        $podkategorija = 'Peći za lemljenje';
        break;
        case 'Talasno-lemljenje':
        $podkategorija = 'Sistemi za talasno-lemljenje';
        break;
        case 'Optička-inspekcija':
        $podkategorija = 'Sistemi za optičku inspekciju';
        break;
        case 'Stencile-printeri':
        $podkategorija = 'Stencile štampači';
        break;
        case 'Automatski-dodaci':
        $podkategorija = 'Dodatna oprema za automatske sisteme';
        break;
    }
        
        echo '<ul class="breadcrumb"><li><a href="' . base_url() . 'products">Proizvodi</a></li>';
        echo '<li>></li>';
        echo '<li><a href="' . base_url() . 'products/?category_id=' . $kategorija_id .'">' . $kategorija . '</a></li>';
        echo '<li>></li>';
        echo '<li><a href="' . base_url() . 'products/?subcategory=' . $product['subcategory'] .'">' . $podkategorija . '</a></li>';
        echo '<li>></li>';
        echo '<li><a href="' . base_url() . 'products/' . $product['slug'] .'">' . $product['title'] . '</a></li>';
        echo '</ul>';
                       
    ?>

    <div class="product-card-big">
        <div class="d-flex justify-content-between">
            <h4><b><?php echo $product['title']?></b></h4>
            <h6><small><i>Proizvodjac:</i></small> <b><?php echo $product['proizvodjac']?></b></h6>
        </div>

        <div class="justify-content-start d-flex align-items-center">
            <img src="<?php echo base_url(); ?>assets/img/productimg/<?php echo $product['product_image'] ?>"
                alt="tmt-9000s-small">
            <ul class="ml-md-3">
                <?php $karakter_niz = explode(', ', $product['karakteristike']); ?>
                <?php foreach($karakter_niz as $string) : ?>
                <li><?php echo $string ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <p class=" text-justify"><?php echo $product['opis'] ?> </p>
        <a class="text-primary" href="<?php echo $product['url'] ;?>"><i>Detaljnije na
                sajtu proizvođača...</i></a>

        <div id="testovni">
            <br>
            <a href="<?php echo base_url(); ?>products/edit/<?php echo $product['slug']; ?>"
                class="btn btn-primary float-left">Edit</a>
            <?php echo form_open('/products/delete/' . $product['id']); ?>
            <input type="submit" value="Delete" class="btn btn-danger">
            <!-- <button class="btn btn-danger">Obrisi</button><button class="btn btn-success">Izmeni</button> -->
            </form>
        </div>

    </div>

</div>
</div>
</div>
<!-- container end x-->
</section>
</main>