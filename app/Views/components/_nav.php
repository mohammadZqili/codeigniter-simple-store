<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Electric Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="/products">Home</a></li>
                <li class="nav-item "><a class="nav-link" href="/brands">Brands</a></li>
                <li class="nav-item "><a class="nav-link" href="/categories">Categories</a></li>
                <li class="nav-item "><a class="nav-link" href="/products">Products</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider"/>
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                    </ul>
                </li>
                <?php
                if (logged_in()) {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="/logout">Log out</a></li>
                    <?php
                }
                ?>
            </ul>
            <?php
            if (logged_in() && in_groups(['customer'])) {
                ?>
                <form class="d-flex" action="/wish">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Wish List

                    </button>
                </form>


                <?php
            }
            ?>
        </div>
    </div>
</nav>
