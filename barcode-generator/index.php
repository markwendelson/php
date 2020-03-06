<html>
    <head>
        <title>Barcode Generator</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <?php
                require 'vendor/autoload.php';
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();

                $products = file_get_contents('products.json');
                $json = json_decode($products);
                foreach ($json as $value) {
                    echo '<div class="card border-0" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">'.$value->product_name.'</h5>
                                <h6 class="card-subtitle mb-2 text-muted">'.$value->product_number.'</h6>
                                <p class="card-text">
                                '.$generator->getBarcode($value->product_code, $generator::TYPE_CODE_128, 3, 50).'
                                </p>
                                <h6 class="card-subtitle mb-2 text-muted">'.$value->product_code.' '.date("Ymd",strtotime($value->expiry_date)).'</h6>
                                <h6 class="card-subtitle mb-2 text-muted">'.$value->price.'</h6>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>

    <?php
        
        // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('123', $generator::TYPE_CODE_128)) . '">';
        // echo $generator->getBarcode($code, $generator::TYPE_CODE_128, 2, 50);

    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>
