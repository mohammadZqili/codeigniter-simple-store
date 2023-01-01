<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Electric</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item "><a class="nav-link" href="/brands">Brands</a></li>
            <li class="nav-item "><a class="nav-link" href="/categories">Categories</a></li>
            <li class="nav-item "><a class="nav-link" href="/products">Products</a></li>
            <?php
            //            var_dump(in_groups(['customer']));die;
            if (logged_in() && in_groups(['customer'])) {
                ?>
                <li class="nav-item "><a class="nav-link" href="/wish">Wish List</a></li>
                <?php

            }
            if (logged_in()) {
                ?>
                <li class="nav-item "><a class="nav-link" href="/logout">Log out</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>
