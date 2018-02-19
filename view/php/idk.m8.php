<?php ?>

<div style='width: 100vw;'>

    <div id="menubar" class="smooth" style="width: 100vw;">
        <div id="eggShow"><button onclick="loadMenu(0);">show</button></div>
        <div id="eggOptions"><button onclick="loadMenu(1);">edit</button></div>
        <div id="eggRIP"><button onclick="loadMenu(2);">löschen</button></div>
    </div>

    <div id="menu0" style="display: block;">

        <button class='w3-button' onclick='showAllEggs();'>SHOW ME THOS EGG</button>
        <div id='egginc'></div>
    </div>

    <div id="menu1" style="display: none;" class="smooth">
        <div id="banana" class="smooth"></div>
    </div>

    <div id="menu2" style="display: none;" class="smooth">
        <div id="delete" class="smooth">
            <div id="combobox"></div>
            <input type="button" id="remove" value="delete" onclick="removeEgg(1);">
            <input type="button" id="setDeleted" value="setDeleted" onclick="removeEgg(0)">
            <input type="button" id="drop" value="vorsicht der funktioniert würkli" onclick="dropTable();">
        </div>
    </div>

    <div class="w3-container">
        <button onclick="document.getElementById('addEgg').style.display = 'block'" class="w3-button w3-black">Add Sum Egg</button>
        <div id="addEgg" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('addEgg').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                    <div style='display: inline-block; width: 100%; text-align: center;'>
                        <div>Color: <div id="eggColor" type="text" class="w3-input"></div></div>
                        <div>Weight: <div id="eggSize" type="text" class="w3-input"></div></div>
                        <div>Type: <div id="eggType" type="text" class="w3-input"></div></div>
                        <div>Name: <input id="eggName" type="text" class="w3-input"></div>
                        <div><input type="button" value="Senden" class="w3-button w3-black" onclick="getEgg()"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    function loadMenu(e) {

        if (e == 0 || e == 1 || e == 2) {
            $("#menu0").css({"display": "none"});
            $("#menu1").css({"display": "none"});
            $("#menu2").css({"display": "none"});
            console.log(e);
            $("#menu" + e + "").css({"display": "block"});
        } else {
            $("#menu1").css({"display": "block"});
            $("#menu2").css({"display": "none"});
            $("#menu3").css({"display": "none"});
        }
    }

    function resTrim(e) {
        console.log(e);
        return e.indexOf("*!*") !== -1 ? alert(e) : e == null ? [] : e;
    }

    function getEgg() {
        var a = new Array({
            "color": $("#eggColor").val(),
            "type": $("#eggType").val(),
            "name": $("#eggName").val(),
            "size": $("#eggSize").val()
        });
        getPostRequest(a, "add", "egg").done(function (e) {
            $("#banana").html(resTrim(e));
        });
    }

    function showAllEggs() {
        getPostRequest(null, "get", "egg").done(function (e) {
            $("#egginc").html(resTrim(e));
        });
    }

    function removeEgg(i) {
        var id = $('#combobox').val();
        if (i == 1) {
            getPostRequest(id, "delete", "egg").done(function (e) {
                resTrim(e);
            });
        } else {
            getPostRequest(id, "setRIP", "egg").done(function (e) {
                resTrim(e);
            });
        }
    }

    function dropTable() {
        getPostRequest(null, "drop", "egg").done(function (e) {
            resTrim(e);
        });
    }

    $(document).ready(function () {

        $.jqx.theme = 'orange';
        getPostRequest(null, "get", "egg").done(function (e) {
            resTrim(e);
            //dataAdapter
            var source = {datatype: "json", datafields: [{name: 'eggId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
            var a = new $.jqx.dataAdapter(source);
            //combobox
            $('#combobox').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "eggId", itemHeight: 70, height: 40, width: 270});
        });

        getPostRequest(null, 'getColors', 'egg').done(function (e) {
            resTrim(e);
            var source = {datatype: "json", datafields: [{name: 'colorId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
            var a = new $.jqx.dataAdapter(source);
            //combobox
            $('#eggColor').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "colorId", itemHeight: 70, height: 40, width: 270});
        });

        getPostRequest(null, 'getTypes', 'egg').done(function (e) {
            resTrim(e);
            var source = {datatype: "json", datafields: [{name: 'typeId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
            var a = new $.jqx.dataAdapter(source);
            //combobox
            $('#eggType').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "typeId", itemHeight: 70, height: 40, width: 270});
        });

        getPostRequest(null, 'getMinAndMaxSize', 'egg').done(function (e) {
            var arr = JSON.parse(resTrim(e));
            //numeric input field
            $("#eggSize").jqxNumberInput({width: '270px', height: '25px', min: parseFloat(arr[0].min), max: parseFloat(arr[0].max)});
        });

        //buttons
        $("#remove").jqxButton({width: 120, height: 40});
        $("#setDeleted").jqxButton({width: 120, height: 40});
        $("#drop").jqxButton({width: 120, height: 40});

        //numeric input fields

    });

</script>