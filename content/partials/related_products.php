<!-- RELATED PRODUCTS -->

            <div class="related-product-text">
                Možda će Vam zatrebati i ovo
            </div>
            <?php 
        
            $products=$query->relatedProducts($kategorija);
            while ($row=$products->fetch(PDO::FETCH_ASSOC)) {
                if ($row['modlaId']!=$product_id) {
                    $func->write_product($row['modlaId'],$row['slika1'],$row['modlaNaziv']);
                }
               
             } ?>
