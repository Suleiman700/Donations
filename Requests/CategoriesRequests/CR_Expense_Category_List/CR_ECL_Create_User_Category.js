import Ajax from '../../HandleRequest.js';
import RequestAlerts from '../../HandleAlerts.js';

export async function create_user_category() {
    const $name_field = $("#addModal #name")
    const alertElm = "#addModal #alert"

    // Store data into object
    const bodyObj = {
        name: $name_field.val(),
        type: "expense"
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Categories_Controller/CC_Expense/CCE_Create_New_User_Category.php"
    ajax.body = bodyObj

    // Get response data
    const response = await ajax.asyncAjax()
    const data = response["data"]

    // Check response
    const res_code = data.code
    const res_text = data.text

    // Show alert
    const request_alerts = new RequestAlerts(res_code, res_text, "3500", alertElm)
    request_alerts.showAlert()

    // Clear input on success
    if (res_code === "200") {
        $name_field.val("")
        return true
    } else {
        return false
    }


}

