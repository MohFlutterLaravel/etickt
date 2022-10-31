<template>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid ">

            <a class="navbar-brand " style="font-size: 35px;">
                <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30"
                    height="24">
                E-Ticket
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown m-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="fi fi-dz me-1"></span>Arabe</a></li>
                            <li><a class="dropdown-item" href="#"><span class="fi fi-fr me-1"></span>Français</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-transparent m-2 p-2">
                                <i class="fa-solid fa-certificate me-2" style="color: #fbca19"></i>
                                Abonnement
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-primary m-2 p-2" style="color: white; font-weight: bold;"
                            onclick="this.classList.toggle('button--loading')">
                            <span class="button__text">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>
                                Connexion</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="top-sticky">
        <nav class="navbar navbar-light bg-light" style="box-shadow: 0px -1px 0px white;">
            <div class="container-fluid d-flex justify-content-end">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Rechecher" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </div>
    <div class="container">
        <main class="m-2 p-2">
            <router-view></router-view>
        </main>
    </div>

    <div class="pos">
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted screen-change" style="
    background:rgb(226 243 245 / 40%) !important;
    box-shadow: 0px -1px 4px #0e153a42;">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Rejoignez-nous sur les réseaux sociaux:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>E-Ticket
                            </h6>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus molestiae impedit
                                voluptas atque illum! Praesentium consequatur beatae iure minima aliquid unde, alias
                                temporibus ea quasi repudiandae vero, sunt, tempora odit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Produits
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Développement web</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">développement mobile</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Conception</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Corrections de bogues</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                LIENS UTILES
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Tarification</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Réglages</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Ordres</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Aider</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contacts</h6>
                            <p><i class="fas fa-home me-3"></i> Ouargla, OGX 30004, ADL</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                info@eticket.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +213 697 63 69 69</p>
                            <p><i class="fas fa-print me-3"></i> +213 556 15 33 97</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgb(14 21 58 / 51%);color: white;">
                © 2022 Copyright:
                <a class="text-reset fw-bold" href="https://e-ticket.com/">E-ticket.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</template>

<script>
    export default {
        created(){
            this.$router.push({name: 'offres'})
        }
    }

</script>

<style>

</style>
