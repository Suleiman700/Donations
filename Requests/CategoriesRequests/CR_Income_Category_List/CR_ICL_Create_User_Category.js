import Ajax from '../../HandleRequest.js';
import RequestAlerts from '../../HandleAlerts.js';
import { get_user_income_categories } from "./CR_ICL_Get_User_Categories.js";

export async function create_user_category() {
    const $name_field = $("#addModal #name")

    // Store data into object
    const bodyObj = {
        name: $name_field.val()
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Categories_Controller/CC_Income/CCI_Create_New_User_Category.php"
    ajax.body = bodyObj

    // Get response data
    const response = await ajax.asyncAjax()
    const data = response["data"]

    // Check response
    const res_code = data.code
    const res_text = data.text

    // Show alert
    const request_alerts = new RequestAlerts(res_code, res_text, "3500")
    request_alerts.showAlert()

    // Clear input on success
    if (res_code === "200") {
        $name_field.val("")
        return true
    } else {
        return false
    }


}

