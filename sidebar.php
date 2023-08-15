<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url, 'index')) {
    ?>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div>
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="index.php#first_sec" onclick="load_google_news()"
                    class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-newspaper fa-fw me-3"></i><span>Google News</span></a>
                <a href="index.php#first_sec" onclick="load_zdnet_news()"
                    class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-newspaper fa-fw me-3"></i><span>ZD Net News</span></a>
                <?php if (empty($_SESSION['email'])) { ?>
                    <a href="login.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-solid fa-helicopter"></i><span> Login</span>
                    <?php } ?>
                    <?php if (!empty($_SESSION['email'])) { ?>
                        <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-user"></i> Perfil</a>
                    <?php } ?>
            </div>

    </nav>
    <?php
} else {
    if (empty($_SESSION['email'])) { ?>
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div>
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-solid fa-house-user"></i><span> Home</span></a>
                    <a href="index.php#first_sec" onclick="load_google_news()"
                        class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-newspaper fa-fw me-3"></i><span>Google News</span></a>
                    <a href="index.php#first_sec" onclick="load_zdnet_news()"
                        class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-newspaper fa-fw me-3"></i><span>ZD Net News</span></a>
                    <?php if (empty($_SESSION['email'])) { ?>
                        <a href="login.php" class="list-group-item list-group-item-action py-2 ripple">
                            <i class="fas fa-solid fa-helicopter"></i><span> Login</span>
                        <?php } ?>
                        <?php if (!empty($_SESSION['email'])) { ?>
                            <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-user"></i> Perfil</a>
                        <?php } ?>
                </div>

        </nav>
        <?php
    } else {
        ?>
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div>
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                        <i class="fas fa-solid fa-house-user"></i><span> Home</span></a>
                    <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-user"></i><span> Perfil</span></a>
                    <a href="appointments.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-regular fa-calendar-plus"></i><span> Consultas</span></a>
                    <a href="portfolio.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-solid fa-briefcase"></i><span> Portfólio</span></a>
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                        <i></i>
                        <form method="POST" action=""><button href="#" name="logout" class="">Logout</button></form>
                    </a>
                </div>

            </div>

        </nav>
    <?php }
}
;
?>