<?php
$curretPage = $_SERVER['PHP_SELF'];
$curretPage = explode('/', $curretPage);
$curretPage = end($curretPage);

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT LEARNING</title>
    <link rel="icon" href="/assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/assets/css/mobile.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://www.unpkg.com/feather-icons@4.29.0/dist/feather.min.js"></script>
    <?php
    if ($curretPage == 'makeThread.php') {
    ?>
        <link rel="stylesheet" href="../assets/css/froala_editor.css">
        <link rel="stylesheet" href="../assets/css/froala_style.css">
        <link rel="stylesheet" href="../assets/css/plugins/code_view.css">
        <link rel="stylesheet" href="../assets/css/plugins/draggable.css">
        <link rel="stylesheet" href="../assets/css/plugins/colors.css">
        <link rel="stylesheet" href="../assets/css/plugins/emoticons.css">
        <link rel="stylesheet" href="../assets/css/plugins/image_manager.css">
        <link rel="stylesheet" href="../assets/css/plugins/image.css">
        <link rel="stylesheet" href="../assets/css/plugins/line_breaker.css">
        <link rel="stylesheet" href="../assets/css/plugins/table.css">
        <link rel="stylesheet" href="../assets/css/plugins/char_counter.css">
        <link rel="stylesheet" href="../assets/css/plugins/video.css">
        <link rel="stylesheet" href="../assets/css/plugins/fullscreen.css">
        <link rel="stylesheet" href="../assets/css/plugins/file.css">
        <link rel="stylesheet" href="../assets/css/plugins/quick_insert.css">
        <link rel="stylesheet" href="../assets/css/plugins/help.css">
        <link rel="stylesheet" href="../assets/css/third_party/spell_checker.css">
        <link rel="stylesheet" href="../assets/css/plugins/special_characters.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
    <?php
    }
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Include Bootstrap Datepicker CSS -->
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    <?php
    @include '../layout/navbar.php';
    ?>