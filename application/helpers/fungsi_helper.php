<?php
    function enkripsi($x){
        $hasil = base64_encode(openssl_encrypt($x, "AES-256-CBC", "sembarang", 0, "0123456789abcdef"));
        return $hasil;
    }

    function deskripsi($x){
        $hasil = openssl_decrypt(base64_decode($x), "AES-256-CBC", "sembarang", 0, "0123456789abcdef");
        return $hasil;
    }
?>