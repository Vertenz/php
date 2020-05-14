<?php

    function makeDir($name) {
        if (!file_exists($name)) {
           return mkdir($name);
        };
        return true;

    }
