<?php ?>

<div style='width: 100vw;'>

    <div id="messageNotification" class="notification">
        <div id="messageContainer"></div>
    </div>

    <div id="menubar" class="smooth" style="width: 100vw;">
        <div class="nav"><button id="eggEdit" onclick="openEditPopup();" class="w3-button w3-black button" style="width: 270px;">Add</button></div>
    </div>

    <div style="display: block;">
        <div id="grid"></div>
        <button class='w3-button' onclick='showAllEggs();'>Get JSON</button>
        <div id='egginc'></div>
    </div>

    <div id="addPopup" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="closePopup();" class="w3-button w3-display-topright">&times;</span>
                <div style='display: inline-block; width: 100%; text-align: center;'>
                    <div>Color: <div id="eggColor" type="text" class="combobox"></div></div>
                    <div>Weight: <div id="eggSize" type="text" class=""></div></div>
                    <div>Type: <div id="eggType" type="text" class="combobox"></div></div>
                    <div>Name: <input id="eggName" type="text" class="w3-input"></div>
                    <div><input type="button" value="Senden" class="w3-button w3-black button" onclick="addEgg()"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="editPopup" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="closePopup();" class="w3-button w3-display-topright">&times;</span>
                <div style='display: inline-block; width: 100%; text-align: center;'>

                    <div>Name: <input id="editEggName" type="text" class="w3-input"></div>  
                    <div>Weight: <input id="editEggWeight" type="text" class="w3-input"></div>
                    <div>Type: <div id="editEggType" type="text" class="combobox"></div></div>
                    <div>Size: <input id="editEggSize" type="text" class="w3-input"></div>
                    <div>Color: <div id="editEggColor" type="text" class="combobox"></div></div>
                    <div>Status: <input id="eitEggStatus" type="text" class="w3-input"></div>

                    <div>User: <input id="editEggUser" type="text" class="w3-input" disabled></div>

                    <div><input type="button" value="Senden" class="w3-button w3-black button" onclick="editEgg()"></div>
                </div>
            </div>
        </div>
    </div>


</div>