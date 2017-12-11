<?php
$sql = new SQL();
$res = $sql->query("SELECT * from egg;");
print_r($res);
?>

<div>
    <div>Color: <input id="eggColor" type="text" class="w3-input"></div>
    <div>Weight: <input id="eggWeight" type="text" class="w3-input"></div>
    <div>Type: <input id="eggType" type="text" class="w3-input"></div>
    <div>Name: <input id="eggName" type="text" class="w3-input"></div>
    <div><input type="button" value="Senden" class="w3-button w3-black" onclick="getEgg()"></div>
</div>

<div id="banana"></div>

<script>
    /* chunt no ane andere ort, bla bla ke strukur...*/

    function getEgg() {
        var a = new Array({
            "color": $("#eggColor").val(), 
            "type": $("#eggType").val(), 
            "name": $("#eggName").val(),
            "weight": $("#eggWeight").val()
        });
        
        getPostRequest(a, "get", "egg").done(function (e) {
            $("#banana").html(e);
        });
    }

</script>