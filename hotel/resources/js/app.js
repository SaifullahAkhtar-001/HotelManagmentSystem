import './bootstrap';


// import 'https://unpkg.com/alpinejs'

import 'flowbite';
import 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

$(document).ready(function(){
    $("#textToggler").click(function(){
        $(".toggleText").toggle();
    });
})
function toggleImage() {
    $(".hiddenclickimg").toggle();
}



