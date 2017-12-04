<?php ?>

<div>
    <div>Color: <input id="eggColor" type="text" class="w3-input"></div>
    <div>Weight: <input id="eggWeight" type="text" class="w3-input"></div>
    <div>Type: <input id="eggType" type="text" class="w3-input"></div>
    <div><input type="button" value="Senden" class="w3-button w3-black" onclick="getEgg()"></div>
</div>

<div id="banana"></div>

<script>
    /*chunt no ane andere ort, bla bla ke strukur...*/

    function getEgg() {
        var a = new Array($("#eggColor").val(), $("#eggWeight").val(), $("#eggType").val());
        var b = $("#eggColor").val();
        console.log(a);
        getPostRequest(a, "get", "egg").done(function (e) {
            $("#banana").html(e);
        });
        //$("#banana").html(egg.responseText);        
    }

</script>