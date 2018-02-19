<?php ?>

<div style='width: 100vw;'>

    <div id="menubar" class="smooth" style="width: 100vw;">
        <h2>Navigation: </h2>
        <div class="nav"><button id="eggShow" onclick="loadMenu(0);">show</button></div>
        <div class="nav"><button id="eggEdit" onclick="$('#id01').css({'display': 'block'})">add</button></div>
        <div class="nav"><button id="eggOptions" onclick="loadMenu(1);">edit</button></div>
        <div class="nav"><button id="eggRIP" onclick="loadMenu(2);">löschen</button></div>
    </div>

    <div id="menu0" style="display: block;">
        <div id="grid"></div>
        <button class='w3-button' onclick='showAllEggs();'>SHOW ME THOS EGG</button>
        <div id='egginc'></div>
    </div>

    <div id="menu1" style="display: none;" class="smooth">
        <div id="banana" class="smooth"></div>
    </div>

    <div id="menu2" style="display: none;" class="smooth">
        <div id="delete" class="smooth" style="display: inline-block;">
            <div id="combobox" style="display: inline-block;"></div><br>
            <input type="button" id="remove" value="delete" onclick="removeEgg(1);">
            <input type="button" id="setDeleted" value="setDeleted" onclick="removeEgg(0)">
            <input type="button" id="drop" value="vorsicht der funktioniert würkli" onclick="dropTable();">
        </div>
    </div>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
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
        var a = new Array({"color": $("#eggColor").val(), "type": $("#eggType").val(), "name": $("#eggName").val(), "size": $("#eggSize").val()});
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

            console.log(e);
            var t = $.parseJSON(e);
            console.log(t);

            // prepare the data
            var source = {
                datatype: "json",
                datafields: [
                    {name: 'eggId', type: 'string'},
                    {name: 'name', type: 'string'},
                    {name: 'status', type: 'string'},
                    {name: 'eggSize', type: 'string'},
                    {name: 'eggType', type: 'string'},
                    {name: 'eggColor', type: 'string'},
                    {name: 'eggCreated', type: 'string'},
                    {name: 'userId', type: 'string'},
                    {name: 'weight', type: 'string'}
                ],
                id: 'eggId',
                localdata: t
            };

            var dataAdapter = new $.jqx.dataAdapter(source);
            // initialize jqxGrid
            $("#grid").jqxGrid({
                width: "100%",
                source: dataAdapter,
                pageable: true,
                autoheight: true,
                selectionmode: 'singlecell',
                columns: [
                    {text: 'ID', datafield: 'eggId', width: "20%"},
                    {text: 'Name', datafield: 'name', width: "20%"},
                    {text: 'Status', datafield: 'status', width: "20%"},
                    {text: 'Weight', datafield: 'weight', width: "20%"},
                    {text: 'User', datafield: 'userId', width: "20%"}
                ]
            });
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
        
        $("#eggShow").jqxButton({width: 120, height: 40});
        $("#eggEdit").jqxButton({width: 120, height: 40});
        $("#eggOptions").jqxButton({width: 120, height: 40});
        $("#eggRIP").jqxButton({width: 120, height: 40});
    });

</script>