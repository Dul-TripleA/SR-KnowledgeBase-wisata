<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App css -->
    <link href="<?= base_url() ?>/admin__styles/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/admin__styles/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="<?= base_url() ?>/admin__styles/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <link href="<?= base_url() ?>/admin__styles/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/admin__styles/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>/admin__styles/css/vendor/simplemde.min.css" rel="stylesheet" type="text/css" />
    <!-- plugin js -->

    <script src="<?= base_url() ?>/admin__styles/js/vendor/dropzone.min.js"></script>
    <!-- init js -->
    <script src="<?= base_url() ?>/admin__styles/js/ui/component.fileupload.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">