var globalEggArray;
var inputHeight = 40;
var inputWidth = "100%";

$(document).ready(function () {
    $.jqx.theme = 'orange'; //set global jqx theme
    loadDataAndGrid();
    loadAddPopup();
    $(".w3-input").jqxInput({placeHolder: "...", height: inputHeight, width: inputWidth, minLength: 1});
    $(".button").jqxButton({width: inputWidth, height: inputHeight});
});
function loadDataAndGrid() {
    getPostRequest(null, "get", "egg").done(function (e) {
        try {
            globalEggArray = $.parseJSON(e);
            loadGrid(globalEggArray);
        } catch (e) {
            alert("errorrrrr quörry doesnt wörks");
            return null;
        }
    });
}

function loadGrid(e) {
    var classes = "'inline grid_cell'";
    var grid = "<div class='grid'>";
    var header = "<div class='grid_row grid_header'>";
    header += "<div class=" + classes + ">ID</div>";
    header += "<div class=" + classes + ">Name</div>";
    header += "<div class=" + classes + ">User</div>";
    header += "<div class=" + classes + ">Weight</div>";
    header += "<div class=" + classes + ">Type</div>";
    header += "<div class=" + classes + ">Size</div>";
    header += "<div class=" + classes + ">Color</div>";
    header += "<div class=" + classes + ">Created at</div>";
    header += "<div class=" + classes + ">Status</div>";
    header += "<div class=" + classes + ">Delete</div>";
    header += "<div class=" + classes + ">Edit</div>";
    header += "</div>";
    grid += header;
    for (var i = 0; i < e.length; i++) {
        var content = "<div class='grid_row'>";
        content += "<div class=" + classes + ">" + e[i].eggId + "</div>";
        content += "<div class=" + classes + ">" + e[i].name + "</div>";
        content += "<div class=" + classes + ">" + e[i].userId + "</div>";
        content += "<div class=" + classes + ">" + e[i].weight + "</div>";
        content += "<div class=" + classes + ">" + e[i].eggType + "</div>";
        content += "<div class=" + classes + ">" + e[i].eggSize + "</div>";
        content += "<div class=" + classes + ">" + e[i].eggColor + "</div>";
        content += "<div class=" + classes + ">" + e[i].eggCreated + "</div>";
        content += "<div class=" + classes + ">" + e[i].status + "</div>";
        content += "<div class=" + classes + "><button onclick='removeEgg(" + e[i].eggId + ")' class='w3-button w3-black button'>Delete</button></div>";
        content += "<div class=" + classes + "><button onclick='editEggPopup(" + i + ")' class='w3-button w3-black button'>Edit</button></div>";
        content += "</div>";
        grid += content;
    }
    grid += "</div>";
    $("#grid").html(grid);
}

function removeEgg(e) {
    getPostRequest(e, "delete", "egg").done(function (e) {
        loadDataAndGrid();
        message(e);
    });
}

function editEgg() {
    var a = {
        name: $("#editEggName").val(),
        user: $("#editEggUser").val(),
        weight: $("#editEggWeight").val(),
        type: $("#editEggType").val(),
        size: $("#editEggSize").val(),
        color: $("#editEggColor").val(),
        status: $("#eitEggStatus").val()
    };

    getPostRequest($.toJSON(a), 'egg', 'edit').done(function (e) {
        message(resTrim(e));
    });
}

function loadAddPopup() {
    getPostRequest(null, 'getColors', 'egg').done(function (e) {
        resTrim(e);
        var source = {datatype: "json", datafields: [{name: 'colorId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
        var a = new $.jqx.dataAdapter(source);
        //combobox
        $('#eggColor').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "colorId", itemHeight: 70, height: inputHeight, width: inputWidth});
        $('#editEggColor').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "colorId", itemHeight: 70, height: inputHeight, width: inputWidth});
    });
    getPostRequest(null, 'getTypes', 'egg').done(function (e) {
        resTrim(e);
        var source = {datatype: "json", datafields: [{name: 'typeId', type: 'string'}, {name: 'name', type: 'string'}], localdata: e};
        var a = new $.jqx.dataAdapter(source);
        //combobox
        $('#eggType').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "typeId", itemHeight: 70, height: inputHeight, width: inputWidth});
        $('#editEggType').jqxComboBox({selectedIndex: 0, source: a, displayMember: "name", valueMember: "typeId", itemHeight: 70, height: inputHeight, width: inputWidth});
    });
    getPostRequest(null, 'getMinAndMaxSize', 'egg').done(function (e) {
        var arr = JSON.parse(resTrim(e));
        //numeric input field
        $("#eggSize").jqxNumberInput({width: inputWidth, height: inputHeight, min: parseFloat(arr[0].min), max: parseFloat(arr[0].max)});
        $("#editEggWeight").jqxNumberInput({width: inputWidth, height: inputHeight, min: parseFloat(arr[0].min), max: parseFloat(arr[0].max)});
    });
}

function closePopup() {
    $("body").css({"overflow": "auto"});
    $(".w3-modal").css({"display": "none"});
}

function editEggPopup(e) {
    var row = globalEggArray[e];
    console.log(row);
    if (row) {

        $("#editEggColor").jqxComboBox('selectItem', row.eggColor);
        $("#editEggType").jqxComboBox('selectItem', row.eggType);

        $("#editEggName").val(row.name);
        $("#editEggUser").val(row.userId);
        $("#editEggWeight").val(row.weight);
        $("#editEggSize").val(row.eggSize);
        $("#eitEggStatus").val(row.status);
        $("#editPopup").css({"display": "block"});
    }
}

function resTrim(e) {
    console.log(e);
    return e.indexOf("*!*") !== -1 ? alert(e) : e == null ? [] : e;
}

function addEgg() {
    var a = new Array({"color": $("#eggColor").val(), "type": $("#eggType").val(), "name": $("#eggName").val(), "size": $("#eggSize").val()});
    getPostRequest(a, "add", "egg").done(function (e) {
        message(e);
        loadDataAndGrid();
    });
}

function showAllEggs() {
    getPostRequest(null, "get", "egg").done(function (e) {
        $("#egginc").html(resTrim(e));
    });
}

function dropTable() {
    getPostRequest(null, "drop", "egg").done(function (e) {
        resTrim(e);
    });
}

function openEditPopup() {
    $("#addPopup").css({"display": "block"});
    $("body").css({"overflow": "hidden"});
}

function message(e) {
    $("#messageNotification").css({"display": "block"});
    $("#messageContainer").html(e.indexOf("true") !== -1 ? "Erfolgreich" : "Es gab einen Fehler");
    setTimeout(function (e) {
        $("#messageNotification").css({"display": "none"});
    }, 3000);
}