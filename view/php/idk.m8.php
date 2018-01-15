<?php ?>

<div style='width: 100vw;'>

    <div id="" style="height: 100vh; display: inline-block;">
        <div id="eggGrid"><span onclick="loadMenu(0)">Table</span></div>
        <div id="eggSingle"><span onclick="loadMenu(1)">Rest</span></div>
    </div>
    <div style='display: inline-block;'>
        <button class='w3-button' onclick='showAllEggs();'>SHOW ME THOS EGG</button>
        <div id='egginc'></div>
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

    function removeEgg(i) {
        var id = $('#combobox').val();
        console.log(id + " " + i);
        if (i == 1) {
            getPostRequest(id, "delete", "egg").done(function (e) {
                console.log(e);
            });
        } else {
            getPostRequest(id, "setDeletetd", "egg").done(function (e) {
                console.log(e);
            });
        }
    }

    function dropTable() {
        getPostRequest(null, "drop", "egg").done(function (e) {
            console.log(e);
        });
    }

    $(document).ready(function () {

        $.jqx.theme = 'orange';
        getPostRequest(null, "get", "egg").done(function (e) {

            //dataAdapter
            var s = {datatype: "json", datafields: [{name: 'eggId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
            var a = new $.jqx.dataAdapter(s);
            //combobox
            $('#combobox').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "eggId", itemHeight: 70, height: 25, width: 270});

            //list
            $("#grid").jqxGrid({
                width: getWidth('Grid'),
                source: dataAdapter,
                showfilterrow: true,
                filterable: true,
                pageable: true,
                autoheight: true,
                editable: true,
                localization: getLocalization('de'),
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
            });

        });

        $("#remove").jqxButton({width: 120, height: 40});
        $("#setDeleted").jqxButton({width: 120, height: 40});
        $("#drop").jqxButton({width: 120, height: 40});

    });

</script>