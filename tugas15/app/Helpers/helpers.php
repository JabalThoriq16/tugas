<?php
    function formatDates($value){
        return date('d M Y'. strtotime($value));
    }
?>