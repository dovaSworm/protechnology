<br><br><br><br><br>
<h2><?= $title ?></h2>

<div class="container">
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('products/update'); ?>
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <input type="hidden" name="slika" value="<?php echo $product['product_image']; ?>">
        <div class="form-group">
            <label >Naziv</label>
            <input type="text" class="form-control" name="title"
                placeholder="Unesi naziv" value="<?php echo $product['title'] ?>">
        </div>
        <div class="form-group">
            <label>Kategorija</label>
            <select name="category_id" id="" class="form-control">
                <?php foreach($categories as $category): ?>
                    <option selected="selected" value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                
                <?php endforeach; ?>

            </select>
        </div>
        <div class="form-group">
            <label>Url</label>
            <input type="text" class="form-control" name="url"  placeholder="url" value="<?php echo $product['url'] ?>">
        </div>
        <div class="form-group">
            <label>Podkategorija</label>
            <input type="text" class="form-control" name="podkategorija"  placeholder="podkategorija" value="<?php echo $product['subcategory'] ?>">
        </div>
        <div class="form-group">
            <label>Proizvodjac</label>
            <input type="text" class="form-control" name="proizvodjac"  placeholder="proizvodjac" value="<?php echo $product['proizvodjac'] ?>">
        </div>
        <div class="form-group">
            <label>Karakteristike</label>
            <textarea name="karakteristike" class="form-control"  placeholder="karakteristike" ><?php echo $product['karakteristike'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Opis</label>
            <textarea name="opis" class="form-control"  placeholder="opis"><?php echo $product['opis'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Slika</label>
            <input type="file" name="userfile" size="20" placeholder="upload image">
        </div>
        <div class="form-group">
            <label>Preporucujemo</label>
            <!-- <input type="boolean" name="preporucujemo" placeholder="Preporucujemo"> -->
            <input type="checkbox" name="preporucujemo" value="accept" checked="checked" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>