import Ajax from '../../HandleRequest.js';
import ErrorModal from '../../../Scripts/Error_Modal.js';
import RequestAlerts from '../../HandleAlerts.js';


const editModal = "editModal"
const save_btn = "save"
const $editModal_SaveBtn = $(`#${editModal} #${save_btn}`)
const $editModal_NameField = $(`#${editModal} #name`)
const editModal_AlertElm = `#${editModal} #alert`

function toggleModal(option) {
    if (option === "show") {
        $(`#${editModal}`).modal("show")
    }
    else if (option === "hide") {
        $(`#${editModal}`).modal("hide")
    }
}


export async function edit_user_category() {

    // Open edit modal
    const $edit_cat_btn = $(".edit_category")
    $edit_cat_btn.click(async (e) => {
        const category_id = e.target.id

        // Hide modal
        const request_alerts = new RequestAlerts("", "", "", editModal_AlertElm)
        request_alerts.hideAlert()

        // Store data into object
        const bodyObj = {
            category_id: category_id
        }

        // Setup request
        const ajax = new Ajax()
        ajax.controller = "Categories_Controller/CC_Expense/CCE_Get_Category_Info_For_Edit.php"
        ajax.body = bodyObj

        const response = await ajax.asyncAjax()
        const data = response["data"]

        if (data.code === "200") {
            toggleModal("show")
            $(`#${editModal} #name`).val(data.name)
            $editModal_SaveBtn.attr("key", data.id) // Set key

        } else {
            const errorModal = new ErrorModal("alert-danger", data.text)
            errorModal.showModal()
        }
    })
}

// Submit category edit
export async function submit_edit_user_category() {
    const category_id = $editModal_SaveBtn.attr("key")
    const category_name = $editModal_NameField.val()

    // Store data into object
    const bodyObj = {
        category_id: category_id,
        category_name: category_name
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Categories_Controller/CC_Expense/CCE_Edit_User_Category.php"
    ajax.body = bodyObj

    const response = await ajax.asyncAjax()
    const data = response["data"]

    // Show alert
    const request_alerts = new RequestAlerts(data.code, data.text, "3500", editModal_AlertElm)
    request_alerts.showAlert()

    return !!data.code.startsWith("S-");
}
