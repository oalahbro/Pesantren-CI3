<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P</title>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/style.css") ?>>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href='<?php echo base_url() ?>'>WAHDI CENTER</a></div>
            <div class="menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#tutors">Tutors</a></li>
                    <li><a href="#partners">Partners</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li>
                        <?php if (isset($header)) {
                            echo "<a href='" . base_url("/Loginsignup/profile'>") . $header . "</a> | <a href='" . base_url('/Loginsignup/logout') . "'>Logout</a>";
                        } else { ?>
                            <a href="<?php echo base_url('Loginsignup') ?>" class="tbl-biru">Login</a>
                        <?php } ?>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">