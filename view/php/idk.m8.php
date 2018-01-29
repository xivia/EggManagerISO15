<?php ?>

<div style='width: 100vw;'>

    <div id="menu_0">
    <div id="" style="height: 100vh; display: inline-block;">
        <div id="eggGrid"><span onclick="loadMenu(0)">Table</span></div>
        <div id="eggSingle"><span onclick="loadMenu(1)">Rest</span></div>
    </div>
    <div style='display: inline-block;'>
        <button class='w3-button' onclick='showAllEggs();'>SHOW ME THOS EGG</button>
        <div id='egginc'></div>
    </div>
    </div>
    <div id="grid"></div>
    <div id="banana"></div>

    <div id="delete">
        <div id="combobox"></div>
        <input type="button" id="remove" value="delete" onclick="removeEgg(1);">
        <input type="button" id="setDeleted" value="setDeleted" onclick="removeEgg(0)">
        <input type="button" id="drop" value="vorsicht der funktioniert würkli" onclick="dropTable();">
    </div>

    <div class="w3-container">
        <button onclick="document.getElementById('addEgg').style.display = 'block'" class="w3-button w3-black">Add Sum Egg</button>
        <div id="addEgg" class="w3-modal">
            <div class="w3-modal-content">
                <div class="w3-container">
                    <span onclick="document.getElementById('addEgg').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                    <div style='display: inline-block; width: 100%; text-align: center;'>
                        <div>Color: <input id="eggColor" type="text" class="w3-input"></div>
                        <div>Weight: <input id="eggWeight" type="text" class="w3-input"></div>
                        <div>Type: <input id="eggType" type="text" class="w3-input"></div>
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
        if (e == 0) {
           $("#menu0").css({display: "block"});
           $("#menu1").css({display: "none"});
        } else if (e == 1) {
           $("#menu0").css({display: "none"});
           $("#menu1").css({display: "block"});
        } else {
           $("#menu0").css({display: "block"});
           $("#menu1").css({display: "none"});
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
            "weight": $("#eggWeight").val()
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
        console.log(id + " " + i);
        if (i == 1) {
            getPostRequest(id, "delete", "egg").done(function (e) {
                console.log(resTrim(e));
            });
        } else {
            getPostRequest(id, "setDeletetd", "egg").done(function (e) {
                console.log(resTrim(e));
            });
        }
    }

    function dropTable() {
        getPostRequest(null, "drop", "egg").done(function (e) {
            console.log(resTrim(e));
        });
    }

    $(document).ready(function () {

        $.jqx.theme = 'orange';
        getPostRequest(null, "get", "egg").done(function (e) {
            resTrim(e);
            //dataAdapter
            var s = {datatype: "json", datafields: [{name: 'eggId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
            var a = new $.jqx.dataAdapter(s);
            //combobox
            $('#combobox').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "eggId", itemHeight: 70, height: 25, width: 270});

            //list3
            /*$("#grid").jqxGrid({
                width: "25%",
                source: a,
                showfilterrow: true,
                filterable: true,
                pageable: true,
                autoheight: true,
                editable: true,
                selectionmode: 'singlecell',
                columns: [
                    {text: 'eggId', columntype: 'textbox', filtertype: 'textbox', datafield: 'name', width: 180},
                    {text: 'name', filtertype: 'textbox', datafield: 'productname', width: 220},
                    {text: 'eggColor', datafield: 'date', columntype: 'datetimeinput', filtertype: 'date', width: 210, cellsalign: 'right', cellsformat: 'd'},
                    {text: 'eggSize', datafield: 'quantity', columntype: 'numberinput', filtertype: 'textbox', cellsalign: 'right', width: 60},
                    {text: 'eggType', datafield: 'quantity', columntype: 'numberinput', filtertype: 'textbox', cellsalign: 'right', width: 60},
                    {text: 'eggStatus', datafield: 'quantity', columntype: 'numberinput', filtertype: 'textbox', cellsalign: 'right', width: 60},
                    {text: 'weight', datafield: 'quantity', columntype: 'numberinput', filtertype: 'textbox', cellsalign: 'right', width: 60},
                    {text: 'eggCreated', datafield: 'datetime', columntype: 'numberinput', filtertype: 'textbox', cellsformat: "c2", cellsalign: 'right'}
                ]
            });*/

        });

        $("#remove").jqxButton({width: 120, height: 40});
        $("#setDeleted").jqxButton({width: 120, height: 40});
        $("#drop").jqxButton({width: 120, height: 40});

    });

</script>