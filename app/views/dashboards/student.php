<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once APPROOT . '/views/includes/head.php' ?>
</head>

<body>
    <header>
        <?php require_once APPROOT . '/views/includes/navbar.php' ?>
    </header>
    <main>
        <div class="grid-main">
            <div>
                <?php require_once APPROOT . '/views/includes/sidebar.php'; ?>
            </div>
            <div class="main-grid-items">
                <div class="container-3">
                    <div>
                        <div class="unigrid-col2">
                            <h1 class="GridHeader1">Items geleend:</h1>
                            <h1 class="GridHeader2">Actief:</h1>

                            <div class="GridCol1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis at, rerum alias velit enim asperiores qui ex non optio vitae excepturi mollitia amet magnam minus perspiciatis est modi veniam voluptas?
                            </div>
                            <div class="GridCol2">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo corporis hic reiciendis. Iure fuga nisi cum ipsa est, libero vel obcaecati, nesciunt maiores dolore magnam repudiandae quibusdam beatae porro neque.
                            </div>
                        </div>
                        <div class="unigrid-col2">
                            <h1 class="GridHeader1">Leen item:</h1>
                            <h1 class="GridHeader2">Item annuleren:</h1>

                            <div class="GridCol1"><a href=""><button>Lenen</button></a></div>
                            <div class="GridCol2"><a href=""><button>Annuleer</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
        <?php require_once APPROOT . '/views/includes/footer.php' ?>
    </footer>
</body>

</html>