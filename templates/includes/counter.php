<?php

function counter (string $id) :string {
    return "<button id='$id' class='button' data-count='0'>count is 0</button>";
}