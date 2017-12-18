<?php   ?>

<div style='width: 100vw;'>
    <div style='display: inline-block;'>
        <button class='w3-button' onclick='showAllEggs();'>SHOW ME THOS EGG</button>
        <div id='egginc'></div>
    </div>
    <div style='display: inline-block; width: 30%; float: right;'>
        <div>Color: <input id="eggColor" type="text" class="w3-input"></div>
        <div>Weight: <input id="eggWeight" type="text" class="w3-input"></div>
        <div>Type: <input id="eggType" type="text" class="w3-input"></div>
        <div>Name: <input id="eggName" type="text" class="w3-input"></div>
        <div><input type="button" value="Senden" class="w3-button w3-black" onclick="getEgg()"></div>
    </div>
</div>

<div id="banana"></div>

<script>
    function getEgg() {
        var a = new Array({
            "color": $("#eggColor").val(),
            "type": $("#eggType").val(),
            "name": $("#eggName").val(),
            "weight": $("#eggWeight").val()
        });

        getPostRequest(a, "add", "egg").done(function (e) {
            $("#banana").html(e);
        });
    }

    function showAllEggs() {
        getPostRequest(null, "get", "egg").done(function (e) {
            $("#egginc").html(e);
        });
    }
</script>