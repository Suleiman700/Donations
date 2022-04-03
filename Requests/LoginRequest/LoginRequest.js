import Ajax from '../HandleRequest.js';
import RequestAlerts from '../HandleAlerts.js';

$("#submit").on("click",  async (e) => {
    e.preventDefault()

    const $email = $("#email")
    const $password = $("#password")

    // Store data into object
    const bodyObj = {
        email: $email.val(),
        password: $password.val()
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Login_Controller/LC_Handle_Login.php"
    ajax.body = bodyObj

    // Start request
    try{
        const response = await ajax.asyncAjax()
        const res_code = response.data.code
        const res_text = response.data.text

        if (res_code === "200") {
            window.location.href = "../dashboard/index.php";
        } else {
            const request_alerts = new RequestAlerts(res_code, res_text)
            request_alerts.showAlert()
        }

    } catch(e){
        console.log(e);
    }

    // handleRequest(data) // Would print 'test' in the console.
    // Make request
    //Test("hi")
})

