<?php
session_start();

$compraRealizada = "";

if (isset($_SESSION['cliente'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['accion'])) {
            if ($_POST['accion'] == 'Anotar' && isset($_POST['fruta']) && isset($_POST['cantidad'])) {
                $fruta = $_POST['fruta'];
                $cantidad = (int)$_POST['cantidad'];

                if (!isset($_SESSION['pedidos'][$fruta])) {
                    $_SESSION['pedidos'][$fruta] = 0;
                }

                $_SESSION['pedidos'][$fruta] += $cantidad;

                $compraRealizada = "Fruta $fruta agregada. Cantidad: " . $_SESSION['pedidos'][$fruta];
            } elseif ($_POST['accion'] == 'Terminar') {
                $compraRealizada = "Pedido realizado exitosamente.";
                header('Location: despedida.php');
                exit();
            }
        }
    }

    include('compra.php');
} elseif (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    include('compra.php');
} else {
    include('bienvenida.php');
}

