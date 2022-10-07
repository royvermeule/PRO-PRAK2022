<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once APPROOT . '/Views/Includes/Navbar.php';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['title'];?></title>
    
    <link rel="stylesheet" href="<?=URLROOT?>/public/css/auracss.css">

    <div class="container-11">
        <div class="row flex-jc-center">
            <div class="flex-jc-center-height">
                <header>
                    <h3><?=$data['title'];?></h3>
                </header>
            </div>
        </div>
    </div>
</head>
<body>
    <div class="container-11">
        <div class="row flex-jc-center">
            <div class="flex-jc-center-height">
                <?php //var_dump($data); ?>
                <!-- foreach loop
                loop door data[warehouses]
                <=URLROOT?>/CWControllers/<=id?> -->
<table>
<?php 
                foreach ($data['warehouses'] as $warehouse) {
                    ?>
                    <td><button><a href="<?=URLROOT?>/controllers/CWControllers/<?=$warehouse->id?>"><?= $warehouse->name?></a></button></td>
            
                        <?php }?>
</table>
                <!-- <table>
                    <td><button><a href="<=URLROOT?>/CWControllers/WDaltonlaan100">Daltonlaan100</a></button></td>
                    <td><button><a href="<=URLROOT?>/CWControllers/WDaltonlaan200">Daltonlaan200</a></button></td>
                    <td><button><a href="<=URLROOT?>/CWControllers/WDaltonlaan300">Daltonlaan300</a></button></td>
                </table> -->
            </div>
        </div>
    </div>
</body>
</html>