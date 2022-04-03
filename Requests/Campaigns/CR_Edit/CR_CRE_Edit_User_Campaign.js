import Ajax from '../../HandleRequest.js';
import RequestAlerts from '../../HandleAlerts.js';

export async function edit_user_campaign() {
    const $id = $("#id")
    const $name = $("#name")
    const $target = $("#target")
    const $start_date = $("#start_date")
    const $end_date = $("#end_date")
    const $description = $("#description")

    // Store data into object
    const bodyObj = {
        id: $id.val(),
        name: $name.val(),
        target: $target.val(),
        start_date: $start_date.val(),
        end_date: $end_date.val(),
        description: $description.val(),
        edit_campaign: true,
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Campaigns_Controller/CC_Edit_User_Campaign.php"
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
        $name.val("")
        $target.val("")
        $start_date.val("")
        $end_date.val("")
        $description.val("")
        return true
    } else {
        return false
    }
}

