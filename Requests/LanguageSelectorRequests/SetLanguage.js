import Ajax from '../../Requests/HandleRequest.js';


$(document).ready(async function () {
    const $languageselector = $(".languageselector")

    // Set language
    $languageselector.click(async (e) => {
        const selected_language = e.target.id
        // cookies.setCookies("language", string, "30")

        // Store data into object
        const bodyObj = {
            set_language: selected_language
        }

        // Setup request
        const ajax = new Ajax()
        ajax.controller = "Language_Selector_Controller/LSC_Set_Language.php"
        ajax.body = bodyObj

        const response = await ajax.asyncAjax().then(() =>{
            location.reload();
        }).catch((err) => {
            alert("bad")
        })
    });

    // Set chosen language in language picker modal

} );
